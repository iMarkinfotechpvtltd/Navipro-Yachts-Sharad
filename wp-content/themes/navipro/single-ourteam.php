<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 

global $post;

 ?>
 <section class="contact_banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">
 </section>
    <section class="team_innr_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="team_innr">
                        <h3>Our Team</h3>
                        <a href="#" title=""><?php echo get_the_post_thumbnail($post);?></a>
                         <h4><?php echo  $post->post_title;?></h4>
                                       <h5><?php  the_field("member_designation",$post->ID); ?></h5>
                                        <p><?php echo $post->post_content;?></p>
                        
                        <!--blog_rght end-->
                    </div>
                </div>
            </div>
        </div>
 </section>
<?php get_footer(); ?>
