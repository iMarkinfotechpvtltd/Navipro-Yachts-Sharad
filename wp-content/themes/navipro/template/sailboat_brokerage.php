<?php
/* 
	Template Name:	Sailboat_brokerage
*/ 
?>
<?php get_header();?>

<!--******************** START MIDDLE CONTENT DATA ***************-->


<section class="contact_banner">
	<img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">    
</section>

<section class="power_yacht">
     <div class="container">
      <div class="row">
        <div class="col-sm-12">
         <div class="power_yacht_innr wow fadeInUp  animated">
          <h3>Brokerage</h3>  
          <div class="yacht_sec">     
           <div class="table-responsive">
            <table>
			 <thead>
              <tr>
                <th></th> 
                <th>Length</th> 
                <th>Type Of Boat</th>
                <th>Year</th> 
                <th>Price</th> 
                <th>Location</th>  
              </tr>     
             </thead>
             <tbody>
			 
	<!--******************START GETTING DATA FROM CUSTOM POST BROKERAGE************************-->
					<?php 
						$i=1;
						$args=array
								(
									'post_type'      => 'brokerage',
									'posts_per_page' => -1,
									'order'          =>'ASC'
								);
						$brokerage = new WP_Query($args);
						while( $brokerage -> have_posts() ) : $brokerage -> the_post();
					?>	
							  <tr>
								<td><?php the_post_thumbnail('full'); ?></td>
								<td><?php the_field('length',$brokerage->ID);?></td>  
								<td><?php the_title();?></td>  
								<td><?php the_field('year',$brokerage->ID);?></td>  
								<td><?php the_field('price',$brokerage->ID);?></td>    
								<td><?php the_field('location',$brokerage->ID);?></td>  
							  </tr> 
					<?php 
						endwhile;
						wp_reset_query();
					?>
		<!--******************END OF GETTING DATA FROM CUSTOM POST BROKERAGE************************-->
             </tbody>
             <tfoot>    
             </tfoot>  

			 
            </table>   
           </div>     
          </div>    
         </div>    
        </div>  
      </div>     
     </div>    
</section><!--power_yacht end-->
<!--******************** END OF MIDDLE CONTENT DATA ***************-->


<?php get_footer();?>