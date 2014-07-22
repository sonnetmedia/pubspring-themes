<?php
/**
 * The main template file.
 * @package PubSpring Custom Core
 * @since PubSpring Custom Core 1.0
 * Template Name: PubSpring Marketing
 */

get_header(); ?>



<style>
.box{
	background-color: #edebe6;
	padding-top: 1em;
	padding-bottom: 1em;		
	border: 1px solid #d4d4d4;
}

.mc_signup_submit {
/*		float: right;*/
}

.mailing-signup input[type=submit]  {
	display: inline;
/*	width: 140px;*/
}

.mc_input {
}
.mc_signup_submit {
//	display: inline;
width: 300px;
margin: auto;
//float: left;
}

</style>

<!--
    <div class="row email" style="background-color: white ;">
    <div class="container">
					<?php //dynamic_sidebar('sidebar-email'); ?>
    </div>
    </div>
-->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">



      <!-- Three columns of text below the carousel -->
<!--      <div class="row">
        <div class="span4">
          <h2 class="featurette-heading">Subscribe</h2>-->
<!--				<p>Stay up to date on our luncheon series and latest insights on technology for publishers.<p>				-->
				<?php //dynamic_sidebar('sidebar-email'); ?>

    <!--    </div><!-- /.span4 --*>
        <div class="span8">
         
        </div><!-- /.span4 --*>
      </div><!-- /.row --*>-->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" style="margin-top:-100px ;">
      
      
      <div id="pubspring-for-authors" class="featurette row-fluid">
        <div class="span5">
<!--        <img class="featurette-image pull-leftt image-shadow" style="max-width: 100%;" src="http://pubspring.us/wp-content/uploads/2012/12/The_Lagasse_Girls_600_524_c1_center_top_0_0_1.png">-->
        <img class="featurette-image pull-leftt image-shadow" style="max-width: 100%;" src="/wp-content/themes/ps_ch_pubspring_main/images/breezi_placeit_lagasse.jpg">



        
        </div>
                <div class="span7">
        <h2 class="featurette-heading">PubSpring <br /><span class="muted">For Authors</span></h2>
        <p class="lead">We specialize in building website and social media platforms for authors &mdash; a hub on the web to manage your online marketing, all in one place. We don’t just give you a pretty site, we give you tools and training to help you promote and sell. And we make it as easy as possible. </p>
        
                          <p><a class="btn btn-primary" href="#contact">Sign up Now &raquo;</a></p>
        </div>
        
      </div>
      
      
            <hr class="featurette-divider">
      

      <div id="pubspring-for-publishers" class="featurette row-fluid">
      
        <div class="span7">
        <h2 class="featurette-heading">PubSpring <br /><span class="muted">For Publishers</span></h2>
        <p class="lead">We specialize in creating integrated website/social media platforms for publishers to promote books to reviewers, booksellers, and consumers. Our sites are beautifully designed, affordable, easy-to-update, super secure,  and optimized for marketing. </p>
                  <p><a class="btn btn-primary" href="#contact">Start a Discussion &raquo;</a></p>
        </div>
        
        <div class="span5">
<!--          <img class="featurette-image pull-rightTK image-shadow"  style="max-width: 100%;" src="http://pubspring.us/wp-content/uploads/2012/12/bellevue-literary-press_600_402_c1_center_top_0_0_1.png">
          -->
          
          
                        <img class="featurette-image pull-rightTK image-shadow"  style="max-width: 100%;"  src="/wp-content/themes/ps_ch_pubspring_main/images/breezi_placeit_v2.png" alt="">      
          </div>
        
      </div>








      

      <hr class="featurette-divider">

      <div id="contact" class="featurette row-fluid">
                      <div class="span6">
        <h2 class="featurette-heading">Get in Touch. <span class="muted"><!--Checkmate-->.</span></h2>
        <p class="lead">What to expect?<br />
        Once you get in touch we'll set up a call to assess your needs. You'll choose one of our plans, we'll help getting the right content into your site and choosing a design.
        
        
         </p>
</div>

<div class="span5 offset1">
<?php  echo do_shortcode('[gravityform id="2" name="Get in Touch" title="false" description="false" ajax="true"]');    ?>
</div>












      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    
    
    
    
    
    
    
    
    <?php get_footer(); ?>