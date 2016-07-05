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

get_header(); ?>
<section class="contact_banner">
 <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">    
</section>
<section class="blog_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog_innr">

 <div class="blog_lft">
								<?php
										
										global $post;
									
										while ( have_posts() ) : the_post();
								?>
						<div class="abc">
                            <div class="blog_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <div class="blog_date">
                                    <div class="blog_date_innr">
                                        <span><?php the_time('d');?><br><?php the_time('M');?></span>
                                    </div>
                                </div>
                                <div class="blog_cntnt">
                                    <div class="blog_img">
                                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                                    </div>
                                    <div class="blog_descp">
                                        <h2><?php the_title(); ?> </h2>
                                        <ul>
                                            <li><a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i>By <?php the_author();?></a></li>
                                            <li><a href="#" title=""><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('j F Y'); ?></a></li>
                                            
                                        </ul>
                                        <p><?php
										echo wp_trim_words( get_the_content(), 50, '...' );?></p>
                                        <a href="<?php the_permalink();?>" title="" class="read_more">Read More</a>
                                    </div>
                                </div>
                            </div>
						</div>
							<?php
								
								endwhile;
								wp_reset_query();
							?>
                            <!--blog_bx end-->
							
                       </div>
					   <div class="blog_rght">
                            <div class="blog_search_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
							<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                   
							<input type="text"  placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>"><i class="fa fa-search" aria-hidden="true"></i>

                            </form>
                                

                        </div>
                            <div class="recent_post wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <h2><?php the_field('recent_posts',13);?></h2>
                                <ul>
								<?php
										$args = array('post_type' => 'post',
													  'posts_per_page' => 3,
													  'order'        => 'DESC',
													 );
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post();
								?>
                                    <li>
                                        <div class="post_sec">
                                            <div class="post_thumb">
                                                <a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail(array(75,76));?></a>
                                            </div>
                                            <div class="post_cntnt">
                                                <h4><?php the_time('j F Y'); ?></h4>
                                                <p><a href="<?php the_permalink();?>" title=""><?php the_title(); ?></a></p>
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
						</div>
						</div>
						</div>
		  </div>
		  </section>
					   
<?php
get_footer();
?>