<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<footer>
     <div class="container">
      <div class="row">
       <div class="col-sm-12">
        
        <div class="ftr_rght wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
          <div class="hire_sec">    
           <h2><span class="hire_blk">Hire A Yacht</span>Hire</h2>  
           <div class="hire_form">
		   
		   <!--*********START GETTING DATA FROM CONTACT -FORM-7********-->
		   
				<?php echo do_shortcode('[contact-form-7 id="60" title="Contact Form"]'); ?>
           
		    <!--*********END OF GETTING DATA FROM CONTACT -FORM-7********-->
		   
		   <!--<p><span><i class="fa fa-user" aria-hidden="true"></i><input type="text" placeholder="Name"></span></p>  
            <p><span><i class="fa fa-envelope" aria-hidden="true"></i><input type="text" placeholder="Email"></span></p> 
            <p><span><i class="fa fa-phone" aria-hidden="true"></i><input type="tel" placeholder="Contact"></span></p>
            <p><span><i class="fa fa-map-marker" aria-hidden="true"></i><textarea placeholder="Address"></textarea></span></p>
            <p><a href="#" title="" class="hire_btn">Hire</a></p>-->   
           </div>   
          </div>    
        </div> 
        <div class="ftr_lft wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
         <div class="ftr_adrs">
		 
		 <!--*************START GETTING DATA FROM CUSTOM FIELD FOOTER CONTANT SECTION******************-->
		 
          <p><?php the_field('phone_text',6); ?><a href="tel:<?php the_field('phone_number',6); ?>" class="fnt_lite" title=""><?php the_field('phone_number',6); ?></a></p> 
          <p><?php the_field('toll_free',6); ?><a href="tel:<?php the_field('toll_free_number',6); ?>" class="fnt_lite" title=""><?php the_field('toll_free_number',6); ?></a></p>    
          <p class="ftr_txt"><?php the_field('navipro_address',6); ?></p>   
          <div class="subscribe_form">
           
			
    <!--*********START GETTING DATA FROM MAIL CHAMP CUSTOM FORM**********-->
	
			<?php  echo do_shortcode('[mc4wp_form id="274"]'); ?>
			
	<!--*********END OF GETTING DATA FROM MAIL CHAMP CUSTOM FORM**********-->		
			
			
		<!--*************END OF GETTING DATA FROM CUSTOM FIELD FOOTER CONTANT SECTION******************-->	
		
       
          </div><!--subscribe_form end-->
          <div class="footer_social">
           <ul>
            <!--<li><a href="#" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->   
            <li><a href="https://www.facebook.com/DelphiaNorthAmerica" target="_blank()" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>   
            <!--<li><a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->      
           </ul>  
          </div><!--footer_social end-->
          <div class="footer_nav">
            <ul>
             <?php

								$defaults = array(
								'theme_location'  => '',
								'menu'            => 'Footer_menu',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'          => ''
								);

								wp_nav_menu( $defaults );
			?>
            </ul>  
          </div>
          <p class="copyright">Copyright &copy; <?php echo date("Y");?> Navi Pro Yachts. All rights reserved.</p>
          <p class="powered">Powered By: <a target="_blank" href="http://www.imarkinfotech.com/">iMark <span>I</span>nfotech</a></p>
          <!--<p class="poweredby"><span>
                    Powered by <a href="http://imarkinfotech.com" target="_blank"><img src="<?php //echo esc_url(get_template_directory_uri());?>/images/imark-logo.png" alt="imark-logo"></a>
          </span></p>-->   
         </div>    
        </div>   
       </div>      
      </div>     
     </div>    
</footer> 

<?php wp_footer(); ?>	

    <!-- Include all compiled plugins (below), or include individual files as needed -->
	
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/js/wow.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri());?>/js/owl.carousel.js"></script>
    <link href="<?php echo esc_url(get_template_directory_uri());?>/css/animate.min.css" rel="stylesheet" type="text/css">
    <script src="<?php echo esc_url(get_template_directory_uri());?>/js/classie.js"></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/jquery.BlackAndWhite.js"></script>
	
	
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.carousel-1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.fancybox-media.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jssor.slider.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.fancybox.js"></script>
	
    

    <script type="text/javascript">
        jQuery(document).ready(function () {

            var owl = jQuery("#owl-demo");
            owl.owlCarousel({
                itemsCustom: [
                [320, 1],
                 [480, 1],    
                [768, 2],
                [1200, 2],
                [1500, 2]],
                navigation: true,
                slideSpeed: 1000,
                scrollPerPage: true,
                autoPlay:true
            });
        });
    </script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			// jQuery('.fancybox').fancybox();
			jQuery('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
        scrolling   : 'no',
		helpers : {
			media : {
                 overlay : {
    css : { 'overflow' : 'hidden' }
  }
            }
		}
	});

			/*
			 *  Different effects
			 */

		});
	</script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: false, // default
            live: true // default
        })
        wow.init();


        // Offset for Main Navigation
        jQuery('#mainNav').affix({
            offset: {
                top: 100
            }
        })
    </script>
	<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
    <script>
        jQuery(function ($) {

            //Preloader
            var preloader = jQuery('.preloader');
            jQuery(window).load(function () {
                preloader.remove();
            });
        });
    </script>
	

    <script type="text/javascript">
        jQuery(window).load(function () {
            jQuery('.bwWrapper').BlackAndWhite({
                hoverEffect: true, // default true
                // set the path to BnWWorker.js for a superfast implementation
                webworkerPath: false,
                // this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
                intensity: 1,
                speed: { //this property could also be just speed: value for both fadeIn and fadeOut
                    fadeIn: 200, // 200ms for fadeIn animations
                    fadeOut: 800 // 800ms for fadeOut animations
                }
            });
        });
    </script>
	<script>
        jssor_1_slider_init = function () {

            var jssor_1_options = {
                $AutoPlay: true,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $Cols: 4,
                    $SpacingX: 4,
                    $SpacingY: 4,
                    $Orientation: 2,
                    $Align: 0
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 2000);
                    jssor_1_slider.$ScaleWidth(refSize);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
<script>
	jssor_1_slider_init();
</script>
	
	
<!--***********************START SCRIPT ADDED BY DEVELOPER*******************************-->

<script>Conclave.auto()</script>


<!--************************************ Start Script use for enter Alphabets only in (Name) Text box********************-->
<script type="text/javascript">
jQuery(document).ready(function(){
	 jQuery.noConflict();
    jQuery("input[name='Name']").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if((inputValue > 33 && inputValue < 64) || (inputValue > 90 && inputValue < 97 ) || (inputValue > 123 && inputValue < 126)
			&& (inputValue != 32)){
            event.preventDefault();
        }
    });
});
</script>

<!--************************************ End of Script use for enter Alphabets only in (Name) Text box********************-->


<!--**************************** Start Script use for enter number only in (PhoneNumber) Text box ********************-->

<script type="text/javascript">

jQuery(document).ready(function() {
   jQuery("input[name='Contact']").keydown(function (e) {
       // Allow: backspace, delete, tab, escape, enter and .
       if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
           (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            // Allow: home, end, left, right, down, up
           (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
       }
       // Ensure that it is a number and stop the keypress
       if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
           e.preventDefault();
       }
   });
});

</script>

<script type="text/javascript">

jQuery(document).ready(function() {
   jQuery("input[name='Phone']").keydown(function (e) {
       // Allow: backspace, delete, tab, escape, enter and .
       if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
           (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            // Allow: home, end, left, right, down, up
           (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
       }
       // Ensure that it is a number and stop the keypress
       if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
           e.preventDefault();
       }
   });
});

</script>

<!--**************************** End of Script use for enter number only in (PhoneNumber) Text box ********************-->


<!--**************************** Start Script use for enter number only in (POSTAL CODE) Text box ********************-->

<script type="text/javascript">

jQuery(document).ready(function() {
   jQuery("input[name='Postal']").keydown(function (e) {
       // Allow: backspace, delete, tab, escape, enter and .
       if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
           (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            // Allow: home, end, left, right, down, up
           (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
       }
       // Ensure that it is a number and stop the keypress
       if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
           e.preventDefault();
       }
   });
});

</script>

<!--**************************** End of Script use for enter number only in (POSTAL CODE) Text box ********************-->


<script type="text/javascript">
		jQuery(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			jQuery('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			jQuery(".fancybox-effects-a").fancybox({
				'scrolling': 'no',
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0,
						
					}
				}
			});

			// Disable opening and closing animations, change title type
			jQuery(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',
				scrolling   : 'no',

				helpers : {
					title : {
						type : 'over'
						
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			jQuery(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',
			    scrolling   : 'no',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
						
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			jQuery(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,
				scrolling : 'no',
            
				helpers : {
					overlay : null,
					 
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			jQuery('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			jQuery('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			jQuery('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			jQuery("#fancybox-manual-a").click(function() {
				jQuery.fancybox.open('1_b.jpg');
			});

			jQuery("#fancybox-manual-b").click(function() {
				jQuery.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			jQuery("#fancybox-manual-c").click(function() {
				jQuery.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
<!--****************** START SCRIPT USE FOR ADD ACTIVE CLASS FOR BROWSE TAGS *************************-->
<script>
 jQuery(document).ready(function(){
var hash = jQuery(location).attr('href');
var abc=hash.split("/");

if(abc[5]!="")
{

jQuery("."+abc[5]).parent().addClass("active");

}
}); 
</script>
<!--****************** END OF SCRIPT USE FOR ADD ACTIVE CLASS FOR BROWSE TAGS *************************-->


<!--***********************END OF SCRIPT ADDED BY DEVELOPER*******************************-->
</body>
</html>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
					</button>
        <h4 class="modal-title" id="myModalLabel">Request Quote</h4>
      </div>
      <div class="modal-body">	  
      <!--*********GETTING DATA FROM CONTACT-FORM-7 (REQUEST QUOTE FORM)************-->
			<?php echo do_shortcode('[contact-form-7 id="152" title="Request Quote Form"]'); ?>	    
	  </div>
    </div>
  </div>