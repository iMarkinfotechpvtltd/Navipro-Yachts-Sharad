<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 

?>

 
 <section class="contact_banner">
         <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">    
 </section>
    <section class="blog_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog_innr">
                        <h3 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">OUR NEWS STORIES</h3>
                        <div class="blog_lft blog_lft_desc">
						<?php while (have_posts()) : the_post();?>
                            <div class="blog_bx blog_bx_desc wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
							 <div class="blog_date">
								 <div class="blog_date_innr">
									<span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>
								 </div>    
								</div>
                                <div class="blog_cntnt blog_cntnt_desc">
                                    <div class="blog_img">
                                        <a href="#" title=""><?php echo get_the_post_thumbnail($post);?></a>
                                    </div>
                                    <div class="blog_descp">
                                        <h2><?php the_title();?></h2>
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>By <?php the_author(); ?></li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('j F Y'); ?></li>
											
                                        </ul>
                                        <?php the_content();?>

                                    </div>
                                </div>
                            </div>
							<?php
							endwhile;
							?>


                            <!--blog_bx end-->

                        </div>
                        <!--blog_lft end-->
                        <div class="blog_rght">
                           <div class="blog_search_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
							<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                   
							<input type="text"  placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>"><i class="fa fa-search" aria-hidden="true"></i><button></button>

                            </form>
                                

                        </div>
                            <div class="recent_post wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <h2><?php the_field('recent_posts',13);?></h2>
                                <ul>
								<?php
										$args = array('post_type' => 'post',
													  'posts_per_page' => 3,
													  'order'        => 'DESC'
													  );
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post();
								?>
                                    <li>
                                        <div class="post_sec">
                                            <div class="post_thumb">
                                                <a href="#" title=""><?php the_post_thumbnail(array(75,76));?></a>
                                            </div>
                                            <div class="post_cntnt">
                                                <h4><?php the_time('j F Y'); ?></h4>
                                                <p><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php
								endwhile;
								?>
                                </ul>
                            </div>
                            <!--recent_post end-->
                            <div class="browse_tag wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <h2>BROWSE TAGS</h2>
                                <ul>
								<?php 
								$categories=get_categories();
								foreach($categories as $category)
								{
								?>
                                    <li><a href="<?php echo get_category_link($category->cat_ID ); ?>" title=""><?php echo $category->name;?></a></li>
                                <?php
								}
								?>
                                </ul>
                            </div>
                        </div>
                        <!--blog_rght end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
