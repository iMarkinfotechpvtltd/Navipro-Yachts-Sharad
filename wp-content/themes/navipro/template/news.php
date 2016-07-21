<?php 
/* 
	Template Name:	News
*/ 
?>
<?php get_header();?>
<script>
jQuery(document).ready(function()
{
	jQuery('#page_val').val();
});


function pagination()
{
   
	var page_val=jQuery('#page_val').val();
	var page_val1=parseInt(page_val)+1;
	
	// alert(page_val);
	// alert(page_val1);
	
	jQuery('#loading_sec').show();
	jQuery.ajax({
	type: "GET",
	url:"<?php bloginfo('template_url'); ?>/ajax/ajax.php",
	data:{page_val1:page_val1,format:'raw'},
	success:function(resp) 
	{
		
		if( resp !="")
		{
			
			// jQuery('#result').empty().append(resp)
			//alert(resp);
			jQuery('#loading_sec').hide();
			jQuery(resp).insertAfter(jQuery('.blog_bx>div:last')).fadeIn('slow');
			jQuery('#page_val').val(page_val1); 
			
		}
		else if( resp =="")
		{
		jQuery(".load-more").hide();
		}
	} 
	});
	
}
</script>
<!--******************** START MIDDLE CONTENT DATA ***************-->

<section class="contact_banner">
 <img src="<?php echo get_template_directory_uri(); ?>/images/contact_bnr.jpg" alt="contact_banner">    
</section>
    <section class="blog_sec">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        <div class="blog_innr">
         <h3 class="wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms"><?php the_title(); ?></h3>
         <div class="blog_lft">

		<?php
					$i==1;
					$args = array('post_type'      => 'post',
								  'posts_per_page' => 3,
								  'order'          => 'DESC',
								  'offset'         =>  0 );
					$loop = new WP_Query( $args );
				
					while ( $loop->have_posts() ) : $loop->the_post();
		?>	  

          <div class="blog_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="blog_date">
             <div class="blog_date_innr">
              <span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>
             </div>    
            </div>
            <div class="blog_cntnt">
             <div class="blog_img">
               <a href="#" title=""><?php the_post_thumbnail(); ?></a>     
             </div>  
             <div class="blog_descp">
              <h2><?php the_title(); ?></h2>  
              <ul>
                <li><i class="fa fa-user" aria-hidden="true"></i>By <?php the_author(); ?></li> 
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d M Y'); ?></li> 
                  
              </ul>  
              <p><?php the_excerpt(); ?></p>   
              <a href="<?php the_permalink(); ?>" title="" class="read_more">Read More</a>   
             </div>   
            </div>   
          </div><!--blog_bx end-->
	
    <?php 
	$i++;
	endwhile; ?>

    <?php if ($paged > 1) { ?>

    <nav id="nav-posts">
      <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
      <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
    </nav>

    <?php } else { ?>

    <nav id="nav-posts">
      <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
    </nav>

    <?php } ?>

    <?php wp_reset_postdata(); ?>
						<?php
							if($i==3){
								?>
								
							<div class="load-more">
							<div class="load_more wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <input type="hidden" name="page_val" id="page_val" value="1">
								<input type="Submit" value="Load More"  onclick="pagination();" class="load_more_btn ">
                            </div>
							
							<div id="loading_sec" style="display:none" align="center">
								<img src="<?php echo  get_template_directory_uri(); ?>/images/482.gif" id="loader">
								<!--<img src="http://i.imgur.com/kh6soPe.gif">-->
							</div>
							</div>
							<?php 
								}
										
							?>
         </div><!--blog_lft end-->
         <div class="blog_rght">
			<div class="blog_search_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
            
			<!--************************ START FORM TAG FOR CREATING SEARCH BOX *********************-->
			
				<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					   
						   <input type="text" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>"><i class="fa fa-search" aria-hidden="true"></i><button></button>

			   </form>
			
			
			<!--************************ END OF FORM TAG FOR CREATING SEARCH BOX *********************-->
			
			</div>
		
          <div class="recent_post wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Recent Posts</h2>	
            <ul>
			
			<?php
				
				   $args = array( 'numberposts' => '5' ); 
				   $recent_posts = wp_get_recent_posts( $args ); 
				   foreach( $recent_posts as $recent )
				   {
			?>
					 <li>
					  <div class="post_sec">
							<div class="post_thumb"><a href="<?php get_permalink($recent["ID"]) ;?>" title="">
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]),'medium' ); ?>
							<img src="<?php echo $src[0];?>"></a>      
							</div>
							<div class="post_cntnt">
							<?php $pfx_date = get_the_date('d M Y', $recent["ID"] ); ?>
							 <h4><?php echo $pfx_date;?></h4>   
							 <p><a href="<?php the_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"];?></a></p>   
							</div>    
					  </div>     
					 </li>
			<?php
				}
			?>
            </ul>  
          </div><!--recent_post end-->
          <div class="browse_tag wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="300ms">
           <h2>BROWSE TAGS</h2> 
           <ul>
		   
		   <?php 
				$args = array(
								'type' => 'post',
								
								'hide_empty' => 0   
							);
				$categories = get_categories( $args );
                  
					foreach($categories as $category)
					{
						
						if ($category->name != 'Uncategorized') 
						{
							
						?>
									<li><a href="<?php echo get_category_link( $category->term_id ); ?>" title="" class="<?php echo $category->slug; ?>"><?php echo $category->name;?></a></li>
							<?php
						}

					}				
		   ?>
           </ul>   
          </div>   
         </div><!--blog_rght end-->   
        </div>
       </div>      
      </div>     
     </div>    
    </section>
<!--******************** END OF MIDDLE CONTENT DATA ***************-->






<?php get_footer();?>

