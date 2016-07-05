<?php 
/* 
	Template Name:	Power_Yachts
*/ 
?>
<?php get_header();?>

<!--******************** START MIDDLE CONTENT DATA ***************-->

<section class="contact_banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">
        </section>
        <!--contact_banner end-->
<section class="sail_range cstm_yacht">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">  
        <div class="sail_range_innr">
        
		   <?php
				$i=1;
				$args = array( 'taxonomy' => 'power_category','hide_empty'=>0 );
						   $terms = get_terms('power_category', $args);
							// echo "<pre>";
							// print_r($terms);
							// echo "</pre>"; 
						   foreach ($terms as $term) 
						   {
				$slug=$term->slug;

			?>
			 <div class="ycht_bx">
          <h3 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"><?php echo $term->name; ?></h3> 
           <ul>
		   
			<?php 
				$args = array('post_type' => 'power_range','posts_per_page' =>-1,'power_category'=>$slug);
				$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
		   
            <li class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
             <div class="sail_range_list">
              <div class="sail_range_img">
			  
			  <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'sailing_yachts_image_size' ); ?>
			  
                <a href="<?php the_permalink();?>" title=""><img src="<?php echo $src[0];?>"></a>  
              </div>
              <h3><?php the_title(); ?></h3> 
				<p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 100);?></p>
              <a href="<?php the_permalink();?>" title="" class="info_req" >Info Request</a>
              <a href="#" title="" class="quote_req" data-toggle="modal" data-target="#myModal">Request Quote</a>   
             </div>
            </li>  
			<?php endwhile;
			?>
			 </ul> 
          </div> 
			<?php		
			}
			?>   
        </div>
       </div>       
      </div>     
     </div>    
    </section><!--sail_range end-->


<!--******************** END OF MIDDLE CONTENT DATA ***************-->


<?php get_footer();?>