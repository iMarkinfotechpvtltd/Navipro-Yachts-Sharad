<?php 
/* 
	Template Name:	About Us 
*/ 
?>
<?php get_header(); ?>

<!--******************** START MIDDLE CONTENT DATA ***************-->


        <section class="contact_banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">
        </section>
        <!--contact_banner end-->

        <section class="power_yacht abt_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="power_yacht_innr wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h3><?php the_field('living_the_dream_section_1',8)?></h3>
                        <h5><?php the_field('living_the_dream_section_2',8)?></h5>
                        <div class="abt_tp wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="abt_tp_rght">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/sunseeker.png" alt="sunseeker">
                            </div>
                            <div class="abt_tp_lft">
                                <?php the_field('living_the_dream_section_4',8)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--power_yacht end-->
    <section class="abt_dream">
        <div class="container">
            <div class="row wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3><?php the_field('let_us_help_section_1',8)?></h3>
                <h5><?php the_field('let_us_help_section_2',8)?></h5>
                <p><?php the_field('let_us_help_section_3',8)?></p>
            </div>
        </div>
    </section>
	
	 <!--******************START GETTING DATA FROM CUSTOM POST OUR TEAM ************************-->
	
    <!--abt_dream end-->
    <section class="video_main_sec">
     <div class="container">
		  <div class="row">
		   <div class="col-sm-12">
				<div class="video_main_innr">   
					<h2>Our Team</h2>    
					<!-- BEGIN CONTAINER -->
						<div class="video_cstm_slider">
							<div id="wrapper_bu"> <!-- BEGIN CAROUSEL -->
							   <?php
									global $post;
									$i=1;
									query_posts( 
												array 
													( 'post_type' => 'ourteam', 
													  'posts_per_page' => -1, 
													  'order'=>'ASC')  
													); 
								?>
								<?php while ( have_posts() ) : the_post(); ?>
								
							<?php
							// $video_url = get_field("url_embed");
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								?>
								  <div id="bu<?php echo $i; ?>" class="holder_bu_awayL2 holder_bu"> <!-- SLIDE ITEM --> 
									<img src="<?php echo $url; ?>" style=" display: inline-block;">
									  <div class="video_title_main">
									   <h1><?php the_title(); ?></h1>
									 <div class="vidd_test_desi"><h5><?php the_field("member_designation",$post->ID); ?></h5>
									  <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 100);?></p>
									  </div>
										<a href="<?php the_permalink();?>">Read More</a>
									  </div>
										
								  </div>
								<?php $i++; endwhile; wp_reset_query(); ?>
							</div>
						</div>  
				</div>
			</div>           
		</div>
	</div>         
 </section>
    <!--abt_team end-->
    
	<!--******************END OF GETTING DATA FROM CUSTOM POST OUR TEAM ************************-->
	
	
	<section class="abt_reality">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="abt_reality_tab wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
							
                   <!--******************START GETTING DATA FROM CUSTOM POST ABOUT (PART-1)************************-->
							<?php 
								$i=0;
								$args=array
										(
											'post_type'      => 'about',
											'posts_per_page' => 3,
											'order'          =>'ASC'
										);
								$about = new WP_Query($args);
								while( $about -> have_posts() ) : $about -> the_post();
							
								if($i==0)
								{
							?>
								
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="active"><i class="fa fa-caret-right" aria-hidden="true"></i>
								<?php the_title();?></li>
                                <?php 
								$i++;
								}
								else
								{
								?>
									<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>"><i class="fa fa-caret-right" aria-hidden="true"></i>
								<?php the_title();?></li>
								<?php
								$i++;
								}
								?>		
                          
							<?php 
								endwhile;
								wp_reset_query();
							?>
							  </ol>
							<!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i>
								</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i>
								</span>
                            </a>
							
				<!--******************END OF GETTING DATA FROM CUSTOM POST ABOUT (PART-1)************************-->  
							
				
                <!--******************START GETTING DATA FROM CUSTOM POST ABOUT (PART-2)************************--> 				
						
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							
							<?php 
								$i=0;
								$args=array
										(
											'post_type'      => 'about',
											'posts_per_page' => -1,
											'order'          =>'ASC'
										);
								$about = new WP_Query($args);
								while( $about -> have_posts() ) : $about -> the_post();
							
								if($i==0)
								{
							?>
                                <div class="item active">
                                    <div class="tb_bx_img">
                                        <?php the_post_thumbnail('about_slider_image_size'); ?>
                                    </div>
                                    <div class="tb_bx_cntnt">
                                        <?php the_content();?>
                                    </div>
                                </div>
							<?php 
								$i++;
								}
								else
								{
							?>
									<div class="item">
										<div class="tb_bx_img">
											<?php the_post_thumbnail('about_slider_image_size'); ?>
										</div>
										<div class="tb_bx_cntnt">
											<?php the_content();?>
										</div>
									</div>
									
							<?php
									$i++;	
								}
							?>
							<?php 
									endwhile;
									wp_reset_query();
							?>
                                
					<!--******************END OF GETTING DATA FROM CUSTOM POST ABOUT (PART-2)************************-->  
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!--******************** END OF MIDDLE CONTENT DATA ***************-->

<?php get_footer();?>