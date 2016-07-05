<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="contact_banner">
         <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">    
</section>
	<div id="primary" class="error_bx">
	 <section class="error-404 not-found">
	  <div class="container">
           <div class="row">
            <div class="col-sm-12">
             <div class="error_section"><h1>Page Not Found</h1>   
              <p>The page you requested could not be found.</p>
             </div> 
             </div>   
            </div>
           </div>	
        </section>
        <div class="errr_main">    
        <div class="container">
             <div class="row">
              <div class="col-sm-12">
               <div class="error_btm_cntnt">      
               <h1>404 <i class="icon icon-file-text"></i></h1>  
                <p>We are sorry, but the page you were looking for doesn't exist.</p>
              </div>   
             </div>
            </div> 
        </div>    
	</div>
	</div><!-- .content-area -->


<?php get_footer(); ?>
