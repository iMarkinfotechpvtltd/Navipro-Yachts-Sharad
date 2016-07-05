<?php 
/* 
	Template Name:	Home
*/ 
?>
<?php get_header();?>

<!--******************************************* START MIDDLE CONTENT DATA *****************************************-->
<section class="banner">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          
		  <!--******** START GETTING BANNER SLIDER (PART-1)*******-->
		  
		  <?php 
				$i=0;
				$args=array
						(
							'post_type'      => 'slider',
							'posts_per_page' => -1,
							'orderBy'        =>'DESC'
						);
				$slider = new WP_Query($args);
			?>	
			<!-- Indicators -->
			<ol class="carousel-indicators">
			<?php	
				while( $slider -> have_posts() ) : $slider -> the_post();
				if($i==0)
				{
			?>		
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="active"></li>
			<?php	
					$i++;
				}
				else
				{
					
			?>	
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>"></li>
			<?php	
					$i++;
				}
				endwhile;
				wp_reset_query();
		    ?>	
			</ol>
			 <!--******** END OF GETTING BANNER SLIDER (PART-1)*******-->
          
		  <!--******** START GETTING BANNER SLIDER (PART-2)*******-->
		  <?php 
				$i=0;
				$args=array
						(
							'post_type'      => 'slider',
							'posts_per_page' => -1,
							'orderBy'        =>'DESC'
						);
				$slider = new WP_Query($args);
			?>

		  <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
		  
		  <?php	
				while( $slider -> have_posts() ) : $slider -> the_post();
				if($i==0)
				{
		  ?>	
					<div class="item active">
		 <?php 	
				}
				else
				{
		 ?>
					<div class="item">
		<?php	
				}
		 ?>	    
					<?php the_post_thumbnail('slider_image_size'); ?>
							<div class="home_caption">
								 <div class="display-table">
									<div class="display-table-cell">
										<div class="banner_innr">
											<a href="#" title="" class="read_more"></a>
											<h2>E<span class="blue">x</span>perience</h2>
											<h4>The <bold> Luxury </bold></h4>
										</div>
									</div>
								</div>    
							</div>
					</div>
					
		<?php 
				$i++;
				endwhile;
				wp_reset_query();
		
		?>			  
			</div>
			
		<!--******** END OF GETTING BANNER SLIDER (PART-2)*******-->	
         </div>    
     </div>
</section>
     
<section class="sail_range">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">  
        <div class="sail_range_innr">
          <h2 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"><span class="sail_blk"><?php the_field('sail_range_text',6)?></span> <?php the_field('sail_range_text',6)?></h2>
     <ul>
		  <!--****************** START GETTING CATEGORIES FROM SAIL RANGE CATEGORIES *********************-->
		  <?php
				$i=1;
				$args = array( 'taxonomy' => 'sail_category','hide_empty'=>0 );
				$terms = get_terms('sail_category', $args);

               foreach ($terms as $term) 
               {
               ?>
      
            <li class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
             <div class="sail_range_list">
              <div class="sail_range_img">
              <a href="<?php echo get_category_link( $term->term_id ); ?>" title=""><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>"></a>  
              </div>
			  <h3><a href="<?php echo get_category_link( $term->term_id ); ?>"><?php echo $term->name;?></a></h3> 
			  <p><?php echo wp_trim_words( $term->description, 12);?></p>
			  <?php //echo $term->description;?>  
              <a href="<?php echo get_category_link( $term->term_id ); ?>" title="" class="info_req">Info Request</a>
              <a href="#" title="" class="quote_req" data-toggle="modal" data-target="#myModal">Request Quote</a>   
             </div>
            </li>
			
			<?php 
			
			}
			
			?>
			   </ul>
             </div>
            
			<!--****************** END OF GETTING CATEGORIES FROM SAIL RANGE CATEGORIES *********************-->
		   
        </div>
       </div>       
      </div>     
     </div>    
    </section><!--sail_range end-->
    <section class="sail_range power_range">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        <div class="power_range_innr sail_range_innr">
          <h2 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"> <span class="sail_blk"><?php the_field('power_range_text',6)?></span><?php the_field('power_range_text',6)?></h2> 

		 <ul>
		 <!--****************** START GETTING CATEGORIES FROM POWER RANGE CATEGORIES *********************-->
		 
		 <?php
			$i=1;
			$args = array( 'taxonomy' => 'power_category','hide_empty'=>0 );
            $terms = get_terms('power_category', $args);
			
			   foreach ($terms as $term) 
			   {
			   ?>
					<li class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="500ms">
					 <div class="power_range_list">
					  <div class="power_range_img">
			<a href="#" title=""><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>"></a>  
						<div class="power_range_overlay">
						 <div class="display-table">
						  <div class="display-table-cell">     
						   <img src="../images/small_yacht.png" alt="small_yacht"> 
						   <a href="<?php echo get_category_link( $term->term_id ); ?>" title="">Read More</a>   
						  </div>
						  </div>     
						</div>  
					  </div> 
					  <a href="<?php echo get_category_link( $term->term_id ); ?>" title="" class="see_more">See More</a>  
					  <h3><a href="<?php echo get_category_link( $term->term_id ); ?> "><?php echo $term->name;?></a></h3> 
					  <p><?php echo wp_trim_words( $term->description, 12);?></p> 
					 </div>
					</li>
					
			   <?php 
			   }
			   ?>
		<!--****************** END OF GETTING CATEGORIES FROM POWER RANGE CATEGORIES *********************-->
          </ul>  
        </div>   
       </div>      
      </div>     
     </div>    
    </section><!--power_range end-->
    <section class="sail_range news_sec">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        <div class="sail_range_innr news_sec_innr">   
         <h2 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"><span class="sail_blk"><?php the_field('news_section',18)?></span><?php the_field('news_section',18)?></h2>  
         <div id="owl-demo" class="owl-carousel owl-theme wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms" >
		 
		 <!--******************START GETTING DATA FROM CUSTOM POST NEWS************************-->
							<?php 
								$i=1;
								$args=array
										(
											'post_type'      => 'news',
											'posts_per_page' => -1,
											'orderBy'        =>'DESC'
										);
								$news = new WP_Query($args);
								while( $news -> have_posts() ) : $news -> the_post();
							?>	
								
								<div class="item">
									 <div class="news_slider">
									      <?php the_post_thumbnail('news_image_size'); ?>
									   <div class="news_outer_bx">
											<div class="news_innr_bx">
													<h2><?php the_title();?></h2>
													<?php the_content();?>
											 <div class="news_date"><?php the_field('news_date',$news->posts->ID);?></div>   
										 <ul>
										  <li><a href="<?php the_permalink();?>" title="">Read More</a></li>
										 </ul>   
										</div>   
									  </div>  
									 </div> 
								</div>		   
							<?php 
								endwhile;
							?>
							
				<!--******************END OF GETTING DATA FROM CUSTOM POST NEWS************************-->
		 
          </div>   
        </div><!--owl-carousel end-->    
         <a href="<?php echo site_url();?>/news" class="see_more_btn" title="">See More</a>      
       </div>      
      </div>     
     </div>    
    </section><!--news_sec end-->

<!--******************** END OF MIDDLE CONTENT DATA ***************-->

<?php get_footer();?>