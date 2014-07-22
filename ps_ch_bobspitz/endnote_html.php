<?php


//
// Functions used by the page templates which allow for filtering endnotes
// Use PHP class semantics to enforce that this is the ONLY place where endnote 
// HTML is defined.
//


class Endnote_HTML
{
  // data members
  private $endnote_fields = array();

  function __construct($arg)
  {
    // Assume its a post
    if (is_object($arg))
    {
      $this->make_endnote($arg);
    }

    // The dummy model
    elseif ($arg && $arg == 'model')
    {
      $this->make_endnote_model();
    }

    // Was the input data valid?
    if (0 == count($this->endnote_fields) )
    {
      // Do not throw exception because a partial page is better than a server error
      //throw new Exception('Failed to print endnote because of invalid argument');
      error_log('Failed to print endnote because of invalid argument', 0);
    }
  }


  //
  // Make an endnote-formatted chapter stub from the endnote post
  //
  public static function make_endnote_chapter_stub($post)
  {
    $chapter_name = '';
    if ($post){
      $terms = get_the_terms( $post->ID, 'endnote_chapters' );
      if ( $terms && ! is_wp_error( $terms ) )
      {
        // NOTE: There is only ever one chapter term but get_the_terms() returns 
        //       a slice of array with unknown index so $terms[0] is wrong 
        $term = current($terms);
        $chapter_name = $term->name;
      }
    }
    return '<span class="endnote_chapter_stub red">' . $chapter_name . '</span>';
  }


  //
  // Make an endnote-formatted page number from the endnote post
  //
  public static function make_endnote_page_number($post)
  {
    if ($post)
    {
      $the_page_number = get_field('endnote-page_number', $post->ID);
    }
    $the_page_number = ( isset($the_page_number) ) ? $the_page_number : '';
    return '<h2 class="note-page-number" style="display: inline-block;margin-top: 14px;">' . $the_page_number . '</h2>';
  }


  //
  // Make an endnote-formatted content description from the endnote post
  //
  public static function make_endnote_content($post)
  {
    $content_element = $post ? $post->post_content : '<p></p>';

    // post_content makes no guarantee that it will be wrapped in P HTML tags
    if ( (7 > strlen($content_element)) || 
         (0 != strcasecmp("<p>", substr($content_element, 0, 3))) )
    {
      $content_element = '<p>' . $content_element . '</p>';
    }

    // insert the class attribute
    $content_element = '<p class="endnote_description">' . substr($content_element, 3);

    return $content_element;
  }


  //
  // Mark any instances of text in the endnote content. This is used for styling the
  // text which matches a search-by-text-operation.
  // Note that links or other markup may be embedded in the content. 
  // Returns the marked up content element or false if no matches. Any matches outside of
  // text content (e.g. tag names or attribute names/values) will be ignored.
  //
  public static function make_text_matched_endnote_content($post, $match_text)
  {
    $content_element = Endnote_HTML::make_endnote_content($post);
    $doc = new DOMDocument();

    // Use this xml bit as a hack to force correct encoding on a loaded fragment 
    $doc->loadHTML('<?xml encoding="UTF-8">' . $content_element);
    foreach ($doc->childNodes as $node)
    {
      if ($node->nodeType == XML_PI_NODE)
      {
        // Now remove the xml encoding hack
        $doc->removeChild($node);
        break;
      }
    }
    $doc->encoding = 'UTF-8';

    $p_elements = $doc->getElementsByTagName('p');
    $endnote_html = $p_elements->item(0);

    $count_matches = Endnote_HTML::markup_text_matches($endnote_html, $match_text, true);

    // Hack to print the original HTML fragment without the full document syntax
    $endnote_html_string = simplexml_import_dom($endnote_html)->asXML();

    return ($count_matches > 0) ? $endnote_html_string : false;
  }


  private static function markup_text_matches($element, $search_text, $do_markup)
  {
    // Allow apostrophe search to match right-single-quote
    $pattern_match_text = str_replace("'", "(?:\'|’)", $search_text);
    
    $count_matches = 0;
    $child_nodes = $element->childNodes;
    foreach ($child_nodes as $node)
    {
      if ($node->nodeType == XML_TEXT_NODE)
      {
        $match_rule = "/(.*?)($pattern_match_text)(.*?)(?=$pattern_match_text|$)/i";
        $count_this_node_matches = preg_match_all($match_rule, $node->nodeValue, $matches, PREG_SET_ORDER);

        if ($count_this_node_matches)
        {
          $count_matches += $count_this_node_matches;
          if ($do_markup)
          {
            foreach ($matches as $match_parts)
            {
              if (0 < strlen($match_parts[1]))
              {
                $pre_text = new DOMText(html_entity_decode($match_parts[1]));
                $element->insertBefore($pre_text, $node);
              }              

              $match_text = new DOMElement('span', html_entity_decode($match_parts[2]));
              $element->insertBefore($match_text, $node);
              $match_text->setAttribute('class', 'matching_search_text');
            
              if (0 < strlen($match_parts[3]))
              {
                $post_text = new DOMText(html_entity_decode($match_parts[3]));
                $element->insertBefore($post_text, $node);
              }
            }  // foreach matching phrase

            $element->removeChild($node);

          }  // if do markup

        }  // if any matches found

      }  // if TEXT contents
      
      elseif ($node->nodeType == XML_ELEMENT_NODE)
      {
        // Sub-elements probably have their own special markup, so don't add anymore
        $count_matches += Endnote_HTML::markup_text_matches($node, $search_text, false);
      }
    }
    return $count_matches;
  }


  //
  // Make an endnote-formatted tags element from the endnote post 
  //
  public static function make_endnote_tags($post)
  {
    $tag_links = array();
    if ($post){
      // Get the list of tag links        
      $post_tags = get_the_tags($post->ID);
      if ($post_tags)
      {
        foreach ($post_tags as $tag)
        {
          $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '" rel="tag">' . $tag->name . '</a>';
        }
      }
    }
    $tag_line = ($tag_links) ? 'Tags: ' . implode(', ', $tag_links) : '';
    return '<p class="endnote_tags inline small">' . $tag_line . '</p>';
  }


  //
  // Make an endnote-formatted link from the endnote post
  //
  public static function make_endnote_link($post)
  {
    $link_url = ($post) ? get_permalink($post->ID) : '';
    $link_text = ($post) ? '| permanent link' : '';
    return '<p class="small inline"><a href="' . $link_url . '" class="small endnote_link">' . $link_text . '</a></p>';
  }

    
  // 
  // Generate the endnote HTML
  //
  public function print_HTML()
  {
    if (0 == count($this->endnote_fields) )
    {
      return;
    }
  ?>
  

  
  
  
<div class="row">
<div class="twelve columns">
    <div class="dynamic_endnote_container  <?php  echo $this->endnote_fields['class_attribute'];  ?> "  style="width: 100%;float:left ;">

        <div class="one column dynamic_endnote_page">  <?php  echo $this->endnote_fields['page_number']  ?>  </div>

        <div class="eleven columns dynamic_endnote_content"> 	
 
          <?php
          
           echo $this->endnote_fields['chapter'];
           echo  $this->endnote_fields['content_description'];
           echo $this->endnote_fields['tags'];
           echo $this->endnote_fields['link']; 

          ?>

        </div>

    </div>  <!--/dynamic_endnote_container -->
  </div>   <!--/columns --> 
  </div>   <!--/row -->
  <?php
  }


  //
  // Create the dummy model endnote. The purpose of this is to avoid redefining the 
  // endnote HTML on the frontend. 
  // Rules followed by this class and the endnote filtering page templates:
  //   -Every page with endnote filtering will always have a dummy model
  //   -The dummy model will always be hidden
  //
  private function make_endnote_model()
  {
    $this->endnote_fields['class_attribute'] = 'endnote_model hide';
    $this->endnote_fields['chapter'] = Endnote_HTML::make_endnote_chapter_stub(false);
    $this->endnote_fields['page_number'] = Endnote_HTML::make_endnote_page_number(false);
    $this->endnote_fields['content_description'] = Endnote_HTML::make_endnote_content(false);
    $this->endnote_fields['tags'] = Endnote_HTML::make_endnote_tags(false);
    $this->endnote_fields['link'] = Endnote_HTML::make_endnote_link(false);
  }


  //
  // Create an endnote based on this post.
  // 
  private function make_endnote($post)
  {
    setup_postdata($post);  // TODO: Do we need to call this???

    $this->endnote_fields['class_attribute'] = '';
    $this->endnote_fields['chapter'] = Endnote_HTML::make_endnote_chapter_stub($post);
    $this->endnote_fields['page_number'] = Endnote_HTML::make_endnote_page_number($post);
    $this->endnote_fields['content_description'] = Endnote_HTML::make_endnote_content($post);
    $this->endnote_fields['tags'] = Endnote_HTML::make_endnote_tags($post);
    $this->endnote_fields['link'] = Endnote_HTML::make_endnote_link($post);
  }

}  // end class Endnote_HTML


?>