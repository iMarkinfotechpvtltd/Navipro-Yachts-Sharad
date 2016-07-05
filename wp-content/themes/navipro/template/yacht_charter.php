<?php
/* 
	Template Name:	Yacht_Charter
*/ 
?>
<?php get_header();?>

<!--******************** START MIDDLE CONTENT DATA ***************-->


        <section class="charter_banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/sailboat_charter.jpg" alt="sailboat_charter">
        </section>

   <section class="charter_list">
     <div class="container">
     <div class="row">
      <div class="col-sm-12">
       <div class="charter_list_innr power_yacht_innr">
        <h3>Yacht-Charters</h3>   
        <ul>
		<?php 
				$i=1;
				$args=array
						(
							'post_type'      => 'sailboat_charter',
							'posts_per_page' => -1,
							'order'        =>'ASC'
						);
				$sailboat_charter = new WP_Query($args);
				while( $sailboat_charter -> have_posts() ) : $sailboat_charter -> the_post();
		?>	
					 <li>
						<div class="charter_descp bwWrapper">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						 <a target="_blank" href="<?php the_field('redirect_url',$sailboat_charter->ID); ?>" title="">
							<div class="charter_overlay">
								<h4><?php the_title();?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></h4> 
							</div>
						 </a>						 
						</div>  
					</li> 
		<?php 
				endwhile;
	    ?>
		</ul>   
       </div>      
      </div>     
     </div>
     </div>    
    </section>
<!--******************** END OF MIDDLE CONTENT DATA ***************-->

<?php get_footer();?>