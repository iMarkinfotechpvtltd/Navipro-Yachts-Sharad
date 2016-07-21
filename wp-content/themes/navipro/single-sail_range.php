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

// echo '<pre>';
// print_r($post);
// echo '</pre>';   


 ?>
 <?php
		function get_numerics ($str)
		{
		preg_match_all('/\d+/', $str, $matches);
		return $matches[0];
		}
?>
<section class="product_banner">
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; overflow: hidden; visibility: hidden; width: 1920px; height: 751px; ">

                 <div data-u="slides" class="trns_none" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1920px; height: 760px; overflow: hidden;">
				 
						<!--****** START GETTING DATA FROM SAIL_RANGE CATEGORY POST GALLERY *********-->
						
						<?php 
						  $one1 = get_post_meta($post->ID,'slider_gallery',true); 	
						  $arr1=get_numerics($one1);
							
							foreach($arr1 as $val1)
							{
								$small_image_url1 = wp_get_attachment_image_src($val1, 'full');
						?>
								<div data-p="112.50" style="display: none;">
									<img data-u="image" src="<?php echo $small_image_url1[0]; ?>">
									
									<div data-u="thumb">
										<img class="i" src="<?php echo $small_image_url1[0]; ?>" /> 
									</div>
								</div>
						<?php
							}	
					   ?>	
                </div>
				
				        <!--****** END OF GETTING DATA FROM SAIL_RANGE CATEGORY POST GALLERY *********-->
				
				<!-- Thumbnail Navigator -->
				<div data-u="thumbnavigator" class="jssort11" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;" data-autocenter="2">
					<!-- Thumbnail Item Skin Begin -->
					<div data-u="slides" style="cursor: default;">
						<div data-u="prototype" class="p">
							<div data-u="thumbnailtemplate" class="tp"></div>
						</div>
					</div>
					<!-- Thumbnail Item Skin End -->
				</div>
				<!-- Arrow Navigator -->
				<span data-u="arrowleft" class="jssora02l"  data-autocenter="2"></span>
				<span data-u="arrowright" class="jssora02r" data-autocenter="2"></span>
       </div>   
</section>
        <!--contact_banner end-->
    </header>
    <!--header end-->
	<!--****************START GETTING DATA FROM CUSTOM TABLE IM_SAIL_RANGE*****************-->
	 <?php 
		global $wpdb;
			
	    $result = $wpdb->get_results ( "SELECT * FROM  im_sail_range  WHERE post_id ='".$post->ID."'");	
	  ?>
	  
    <section class="specification">
     <div class="specification_innr wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
      <h2>Specifications</h2>
	  <!--Getting specification of post-->
      <div class="specification_bx">
	  <?php 
	  //echo $post->ID;	
	 foreach ( $result as $page )
		{
				
	  ?>
        <div class="spec1">
		<?php  if($page->Headings!= "")
				{
				?>	
					 <div class="spec_tp">
								 
							<h4><i aria-hidden="true" class="fa fa-caret-right"></i><?php echo $page->Headings;?></h4>    
						
					  <p><?php 
								if($page->col_2!= "")
								{
									echo stripslashes($page->col_1) . "    " . stripslashes($page->col_2);
									
								}
								else
								{
									echo stripslashes($page->col_1);
								}
						?>
						</p> 
					 </div>
			 <?php 
				}//end of if condition
				?> 
        </div>
	<?php }//end of if condition ?>
				
    </section><!--specification end-->
	
	<!--****************END OF GETTING DATA FROM CUSTOM TABLE IM_SAIL_RANGE*****************-->
	
    <section class="product_btm_sec">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        <div class="product_btm_lft wow zoomIn animated" data-wow-duration="1000ms" data-wow-delay="900ms"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#<?php echo $post->ID;?>" aria-controls="delphia" role="tab" data-toggle="tab"><?php echo $post->post_title;?></a></li>
          <li role="presentation"><a href="#gallery" aria-controls="gallerygallery" role="tab" data-toggle="tab">Gallery</a></li>
          <li role="presentation"><a href="#equipment" aria-controls="equipment" role="tab" data-toggle="tab">Equipment</a></li>
          <li role="presentation"><a href="#layouts" aria-controls="settings" role="tab" data-toggle="tab">Layouts</a></li>
          <li role="presentation"><a href="#video" aria-controls="settings" role="tab" data-toggle="tab">Video</a></li>    
          </ul>
          <!-- Tab panes -->
         <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="<?php echo $post->ID;?>">
            <?php 
			if($post->post_content !='')
			{
				echo $post->post_content;
			}
			else
			{
				echo "<h2 class='no_rcrd'>No Record Available</h2>";
			}
			?>
             <p>  
             <a href="#" title="" class="req_quote_btn" data-toggle="modal" data-target="#myModal">Request Quote</a>  
              <a href="#" title="" class="info_req_btn" data-toggle="modal" data-target="#myModal">Information Request</a>   
             </p>     
            <?php 
			 
				 while ( have_posts() ) : the_post();
			 
			 ?>
					 <div class="seeker_img">
						<?php the_post_thumbnail('full');?>    
					 </div> 
				<?php endwhile; wp_reset_query(); ?>	
          </div>
          <div role="tabpanel" class="tab-pane" id="gallery">
			      
				  <ul>
				  <?php 
					  $one11 = get_post_meta($post->ID,'product_gallery',true); 	
					  if($one11 !='')
					  {
					  $arr11=get_numerics($one11); 
						
						 foreach($arr11 as $val11)
						{
							$small_image_url1 = wp_get_attachment_image_src($val11, 'full');
					?>
						
						<li><div class="display-table">
								<div class="display-table-cell">
									<a class="fancybox" href="<?php echo $small_image_url1[0];?>" data-fancybox-group="gallery">
										<img data-u="image"  src="<?php echo $small_image_url1[0]; ?>">
									</a>
								</div>
							</div>
						</li>	 
					<?php
						}//end of foreach loop.	
						}//end of if condition.
						else
						{
							echo "<strong><h2 class='no_rcrd'>No Record Available</h2></strong>";
						}
				   ?>
				   </ul>
				<p>  
           <a href="#" title="" class="req_quote_btn" data-toggle="modal" data-target="#myModal">Request Quote</a>  
              <a href="#" title="" class="info_req_btn" data-toggle="modal" data-target="#myModal">Information Request</a>   
             </p>   
			 <?php 
			 
				 while ( have_posts() ) : the_post();
			 
			 ?>
					 <div class="seeker_img">
						<?php the_post_thumbnail('pro_page_image_size',array(710,327));?> 
					 </div> 
				<?php endwhile; wp_reset_query(); ?>	 
          </div>
          <div role="tabpanel" class="tab-pane" id="equipment">
			   <?php 	
					  $one111 = get_post_meta($post->ID,'product_equipment',true); 	
					  $arr111=get_numerics($one111); 
					  if($one111 != '')
					  {
						  echo $one111;		
					  }
					  else
					  {
						  echo "<strong><h2 class='no_rcrd'>No Record Available</h2></strong>";
					  }
					  
					  
				?>
				<?php 
			 
				 while ( have_posts() ) : the_post();
			 
			 ?>
					 <div class="seeker_img">
					<?php the_post_thumbnail('pro_page_image_size',array(710,327));?>    
					 </div> 
				<?php endwhile; wp_reset_query(); ?>	
          </div>
          <div role="tabpanel" class="tab-pane" id="layouts">
                 <ul>
				 <?php 
	
					  $one11 = get_post_meta($post->ID,'product_layouts',true); 	
					  $arr11=get_numerics($one11); 
					if($one11 != '')
                    {												
						foreach($arr11 as $val11)
						{
							$small_image_url1 = wp_get_attachment_image_src($val11, 'full');
					?>
							<li><div class="display-table">
								<div class="display-table-cell">
									<a class="fancybox" href="<?php echo $small_image_url1[0];?>" data-fancybox-group="layouts">
										<img data-u="image" src="<?php echo $small_image_url1[0]; ?>">	 
									</a>
								</div>
							</div>
						</li>
					<?php
						}//end of foreach loop.
					}//end of if condition.
					else
					{
						 echo "<strong><h2 class='no_rcrd'>No Record Available</h2></strong>";
					}						
				   ?>
				  </ul>
            <p>  
              <a href="#" title="" class="req_quote_btn" data-toggle="modal" data-target="#myModal">Request Quote</a>    
              <a href="#" title="" class="info_req_btn" data-toggle="modal" data-target="#myModal">Information Request</a>   
             </p> 
            <?php 
			 
				 while ( have_posts() ) : the_post();
			 
			 ?>
					 <div class="seeker_img">
					<?php the_post_thumbnail('pro_page_image_size',array(710,327));?> 
					 </div> 
				<?php endwhile; wp_reset_query(); ?>	
          </div>
          <div role="tabpanel" class="tab-pane" id="video">
           <?php 
		   
		     
				if(!empty(get_field("product_video",$post->ID)))
				{
	
					the_field("product_video",$post->ID); 
				}
				else
				{
					 echo "<strong><h2 class='no_rcrd'>No Record Available</h2></strong>";
				}	
				
			?>
           <p>  
              <a href="#" title="" class="req_quote_btn" data-toggle="modal" data-target="#myModal">Request Quote</a>  
              <a href="#" title="" class="info_req_btn" data-toggle="modal" data-target="#myModal">Information Request</a>   
             </p> 
             <?php 
			 
				 while ( have_posts() ) : the_post();
			 
			 ?>
					 <div class="seeker_img">
						<?php the_post_thumbnail('pro_page_image_size',array(710,327));?>    
					 </div> 
				<?php endwhile; wp_reset_query(); ?>	
          </div>   
         </div>   
       </div><!--product_btm_lft end-->
       <div class="product_btm_rght">
        <div class="product_sail_range  wow zoomIn animated" data-wow-duration="1000ms" data-wow-delay="900ms">
          <?php //$args = array( 'posts_per_page' => -1, 'post_type' => 'sail_range', );
         
         //$my_query = null;
         //$my_query = new WP_Query($args);
         
         
         //if( $my_query->have_posts() ) {?>
		 <div class="sail_range_heading"><h2>
		 <?php 
				$var=get_post_type( get_the_ID() );
				$var1=get_post_type_object($var);
				echo $var1->labels->singular_name;
		 ?></h2></div>
         <ul>
			 <?php
				$i=1;
				$args = array( 'taxonomy' => 'sail_category','hide_empty'=>0 );
				$terms = get_terms('sail_category', $args);

               foreach ($terms as $term) 
               {
			?>
				<li>
					<div class="btm_pro_list">
					 <a href="<?php echo get_category_link( $term->term_id ); ?>" title=""><i class="fa fa-caret-right" aria-hidden="true"></i> <strong><?php echo $term->name;?></strong><span><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>"></span></a>    
					</div>  
			   </li> 
			   <?php 
			   }
               ?>
         </ul>   
        </div>
        <div class="product_video_thumb wow zoomIn animated" data-wow-duration="1000ms" data-wow-delay="900ms">
        
		<?php
         
		 //use this function for add no_video class//
		function writeMessage() 
		{
            
			echo ('<script>jQuery(".product_video_thumb").addClass("no_video");</script>');
        }
		
		
      	if(!empty(get_field("post_video",$post->ID)))
				{
	                
					the_field("post_video",$post->ID); 
				}
				else
				{    
			         writeMessage(); /* Calling a PHP Function */
					 echo "<strong><h2 class='no_rcrd'>No Video Available</h2></strong>";
				}	
		?>
		

        </div>   
       </div><!--product_btm_rght end-->    
      </div>     
     </div>    
    </section>


<?php get_footer(); ?>
