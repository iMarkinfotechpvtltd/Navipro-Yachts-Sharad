<?php 
/* 
	Template Name:	ContactUs 
*/ 
?>
<?php get_header();?>

<!--******************** START MIDDLE CONTENT DATA ***************-->

 <section class="contact_banner">
         <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/contact_bnr.jpg" alt="contact_banner">    
 </section>
  <!--contact_banner end-->

<section class="contact_innr">
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        <div class="contact_form  wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
         <div class="cntct_frm">
          <h3>Contact Us</h3> 
		  
		  <!--*********Start Getting Data From Contact -form-7********-->
		
			<?php echo do_shortcode('[contact-form-7 id="52" title="Contact Us"]'); ?>
		    
         </div><!--cntct_frm end-->
		 
		 <!--Google Map Section-->
         <div class="cntct_map  wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
		 
			<?php 
				$location = get_field('contact_us_google_map',20);	
				if( !empty($location) ):	
			 ?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					</div>
				</div>
				<?php endif; ?> 
         </div>  
		 
        </div>   
       </div>      
      </div>     
     </div>     
    </section><!--contatc_innr end-->

<!--******************** END OF MIDDLE CONTENT DATA ***************-->


<!--**************START SCRIPT FOR GOOGLE MAP*****************-->
        <style type="text/css">
            .acf-map {
                border: 1px solid #ccc;
                height: 427px;
                margin: 0;
            }
            /* fixes potential theme css conflict */
            
            .acf-map img {
                max-width: inherit !important;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script type="text/javascript">
            (function ($) {
                /*
                 *  render_map
                 *
                 *  This function will render a Google Map onto the selected jQuery element
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$el (jQuery element)
                 *  @return	n/a
                 */
                function render_map($el) {
                    // var
                    var $markers = $el.find('.marker');
                    // vars
                    var args = {
                        zoom: 30,
                        center: new google.maps.LatLng(0, 0),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    // create map	        	
                    var map = new google.maps.Map($el[0], args);
                    // add a markers reference
                    map.markers = [];
                    // add markers
                    $markers.each(function () {
                        add_marker($(this), map);
                    });
                    // center map
                    center_map(map);
                }
                /*
                 *  add_marker
                 *
                 *  This function will add a marker to the selected Google Map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$marker (jQuery element)
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
                function add_marker($marker, map) {
                    // var
                    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
                    // create marker
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                    });
                    // add to array
                    map.markers.push(marker);
                    // if marker contains HTML, add it to an infoWindow
                    if ($marker.html()) {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content: $marker.html()
                        });
                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });
                    }
                }
                /*
                 *  center_map
                 *
                 *  This function will center the map, showing all markers attached to this map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
                function center_map(map) {
                    // vars
                    var bounds = new google.maps.LatLngBounds();
                    // loop through all markers and create bounds
                    $.each(map.markers, function (i, marker) {
                        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                        bounds.extend(latlng);
                    });
                    // only 1 marker?
                    if (map.markers.length == 1) {
                        // set center of map
                        map.setCenter(bounds.getCenter());
                        map.setZoom(15);
                    } else {
                        // fit to bounds
                        map.fitBounds(bounds);
                    }
                }
                /*
                 *  document ready
                 *
                 *  This function will render each map when the document is ready (page has loaded)
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	5.0.0
                 *
                 *  @param	n/a
                 *  @return	n/a
                 */
                $(document).ready(function () {
                    $('.acf-map').each(function () {
                        render_map($(this));
                    });
                });
            })(jQuery);
        </script>
        <!--**************END OF SCRIPT FOR GOOGLE MAP*****************-->

<?php get_footer();?>