//
// Implement dynamic endnote selection
//
// - Define trigger events
// - Deliver the search criteria to backend
// - Process selected endnotes returned via AJAX with backend
//
    

(function($){

    //
    // All the endnote filtering events work the same way. The backend embeds a hidden 
    // dummy endnote which gives us the HTML structure of the whole block. Then the
    // backend sends the inner HTML segments which have changed. The old visible endnotes
    // are removed and then for each new endnote in the AJAX response from the backend
    // we clone the endnote model and replace the altered inner elements.  That way
    // this script never needs to know the HTML format of an endnote besides the 
    // class and element types of the replaced bits.
    //
    function show_endnotes(backend_fields){

        // Remove the previously selected endnotes (careful not to delete the endnote model)
        // and store a reference to the endnote model
        var endnote_html_model =  $('div.dynamic_endnote_container').filter('div:not(.endnote_model)')
                                   .remove().end().filter('div.endnote_model');

        // The entire block of all endnotes
        var endnotes_block = $('div.endnotes_block');

        // For each endnote in the response, clone the HTML structure and replace all dynamic fields
        var post_items = backend_fields['posts'];
        if (post_items === undefined){
            return;
        }
        for (var this_post = 0; this_post < post_items.length; ++this_post){

            // Unpack all dynamic endnote fields packed into the AJAX response
            var packed_fields = post_items[this_post];
            var chapter_stub_field = packed_fields['endnote_chapter_stub'];
            var page_number_field = packed_fields['note-page-number'];
            var tags_field = packed_fields['endnote_tags'];
            var link_field = packed_fields['endnote_link'];
            var content_field = packed_fields['content'];

            // Clone and replace here
            var new_endnote = endnote_html_model.clone();  //old_endnotes.eq(0).clone();
            endnotes_block.append(new_endnote);
            var new_block = endnotes_block.find('div.dynamic_endnote_container').last();
            new_block.find('span.endnote_chapter_stub').replaceWith(chapter_stub_field).end();
            new_block.find('h2.note-page-number').replaceWith(page_number_field).end();
            new_block.find('p.endnote_tags').replaceWith(tags_field).end();
            new_block.find('a.endnote_link').replaceWith(link_field).end();
            new_block.find('p.endnote_description').replaceWith(content_field).end();
            new_block.removeClass('endnote_model').removeClass('hide');
        }
        // Done displaying all new posts - let the user know load is finished
        $('div#loading_progress_indicator').addClass('hide');
    }


    function show_result_endnotes(backend_fields){
                       
        // Setup results heading
        if (backend_fields.hasOwnProperty('results_title')){
            $('h1.selected_endnote_filter_heading').text(backend_fields['results_title']);
        }

        show_endnotes(backend_fields);
    }


    function clear_previous_searches(widgets){

        // Reset the page search widget
        if (0 <= jQuery.inArray('page', widgets) && endnote_selection_parameters.select_by_page_action !== undefined){
            var slider_block = $('div#page_search_tool');
            slider_block.find('#page_range_slider').slider("option", "value", 1);
            slider_block.find('.page_range_readout').text('Pages').css('color', 'lightgray');
        }

        // Reset the text search widget
        if (0 <= jQuery.inArray('text', widgets) && endnote_selection_parameters.select_by_text_action !== undefined ){
            $('#text_search_tool input.show_filtered_results').val('');
        }
    }


    //
    //////////////////////////     start main script section     /////////////////////////////
    //


    //
    // Is this loaded for a page which supports search-by-page-number
    //

    $(document).ready(function(){
            $('div#search_tool_tabs').tabs();
    });


    if ( endnote_selection_parameters.select_by_page_action !== undefined ){
        var last_page = endnote_selection_parameters.last_endnote_page;
        last_page = (last_page !== undefined) ? parseInt(last_page) : 0;
        var first_page = 1;

        // Tell jquery to build the slider for selecting endnotes by page range
        $(document).ready(function(){
                if (last_page > first_page){
                    var sliderElement = $('div#page_range_slider');
                    sliderElement.slider( { animate : true, 
                                orientation : 'horizontal',
                                min : 1,
                                max : last_page,
                                slide: function(event, ui){
                                var begin_page_range = Math.max(1, (ui.value - (ui.value % 10)));
                                var end_page_range = Math.min(last_page, (begin_page_range + 9));
                                $('p.page_range_readout').text('Pages ' + begin_page_range + ' - ' + end_page_range).css('color', 'darkgray');
                                },

                                stop : function(event, ui){
                                
                                clear_previous_searches(['text']);

                                // Let the user know we are working on the request
                                $('div#loading_progress_indicator').removeClass('hide');
                                $('div.dynamic_endnote_container').addClass('hide');

                                var begin_page_range = Math.max(1, (ui.value - (ui.value % 10)));
                                var end_page_range = Math.min(last_page, (begin_page_range + 9));
                                $('p.page_range_readout').text('Pages ' + begin_page_range + ' - ' + end_page_range).css('color', 'black');

                                // Request the associated endnotes from the backend
                                $.post(endnote_selection_parameters.service_url,
                                       {'action'   : endnote_selection_parameters.select_by_page_action,
                                        'begin_page' : begin_page_range,
                                        'end_page' : end_page_range},
                                       show_result_endnotes );
                            }
                        });
                } // end last page validity test
            });
    }
    

    //
    // Is this loaded for a page which supports search-by-tag
    //
    if ( endnote_selection_parameters.select_by_tag_action !== undefined ){

        $('a.tag_endnote_control').live('click', function(){

                clear_previous_searches(['text', 'page']);

                // Let the user know we are working on the request
                $('div#loading_progress_indicator').removeClass('hide');
                $('div.dynamic_endnote_container').addClass('hide');

                var tag_id = $(this).attr('tag_id');
                var tag_name = $(this).text();

                $.post(endnote_selection_parameters.service_url,
                       {'action'   : endnote_selection_parameters.select_by_tag_action,
                        'tag_id'   : tag_id,
                        'tag_name' : tag_name},
                        show_result_endnotes );
        });
    }
    

    //
    // Is this loaded for a page which supports search-by-chapter
    //
    if ( endnote_selection_parameters.select_by_chapter_action !== undefined ){

        $('a.chapter_endnote_control').live('click', function(){

                clear_previous_searches(['text', 'page']);

                // Let the user know we are working on the request
                $('div#loading_progress_indicator').removeClass('hide');
                $('div.dynamic_endnote_container').addClass('hide');

                var chapter_id = $(this).attr('chapter_id');
                var chapter_name = $(this).text();

                $.post(endnote_selection_parameters.service_url,
                       {'action'       : endnote_selection_parameters.select_by_chapter_action,
                        'chapter_id'   : chapter_id,
                        'chapter_name' : chapter_name},
                        show_result_endnotes );
        });
    }


    //
    // Is this loaded for a page which supports search-by-text
    //
    if ( endnote_selection_parameters.select_by_text_action !== undefined ){

        var keyburst_timeout = new Object();
        keyburst_timeout.waiting = false;

        $('#text_search_tool input.show_filtered_results').live('keyup', function(){

                clear_previous_searches(['page']);

                if (keyburst_timeout.waiting){
                    window.clearTimeout(keyburst_timeout.timer);
                }

                var filter = $(this).val();

                // Wait until the user finishes a burst of typing before fetching results
                keyburst_timeout.waiting = true;
                keyburst_timeout.timer = window.setTimeout(function(){
                        keyburst_timeout.waiting = false;
                        // Let the user know we are working on the request
                        $('div#loading_progress_indicator').removeClass('hide');
                        $('div.dynamic_endnote_container').addClass('hide');

                        $.post(endnote_selection_parameters.service_url,
                               {'action'      : endnote_selection_parameters.select_by_text_action,
                                'filter_text' : filter},
                               show_result_endnotes );
                    },
                    endnote_selection_parameters.text_search_keystroke_threshold);

        });
    }


})(jQuery);



