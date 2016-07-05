<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 


?>

<section class="contact_banner">
            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/contact_bnr.jpg" alt="contact_banner">
</section>

<section class="sail_range cstm_yacht">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">  
        <div class="sail_range_innr">
          <div class="ycht_bx">
          <h3 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"><?php single_cat_title(); ?></h3> 
           <ul>
		   <?php 
		    global $post;

		   while ( have_posts() ) : the_post();
		  
			
		   ?>
            <li class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
             <div class="sail_range_list">
              <div class="sail_range_img">
               <a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('full');?></a> 
              </div>
              <h3><a href="<?php the_permalink();?>" title=""><?php echo $post->post_title;?></a></h3>
					<p><?php $content = $post->post_content; echo mb_strimwidth($content, 0, 100);?></p>
				 <?php //echo $post->post_content;?>  
              <a href="<?php the_permalink();?>" title="" class="info_req">Info Request</a>
              <a href="#" title="" class="quote_req" data-toggle="modal" data-target="#myModal">Request Quote</a>    
             </div>
            </li>
			<?php endwhile; wp_reset_query(); ?>
            
           </ul> 
           </div>  
        </div>
       </div>       
      </div>     
     </div>    
    </section><!--sail_range end-->

			

<?php get_footer(); ?>
