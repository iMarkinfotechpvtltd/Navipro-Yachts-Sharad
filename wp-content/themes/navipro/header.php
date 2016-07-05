<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	
	<!--***********HTML HEAD FILES**********-->
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri());?>/images/favicon.png">
    <title>:: Navipro Yachts - Home ::</title>
    <!-- Bootstrap -->
    <link href="<?php echo esc_url(get_template_directory_uri());?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo esc_url(get_template_directory_uri());?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url(get_template_directory_uri());?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,700,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery.fancybox.css" media="screen" />
	
	
</head>

<body>

<!--**************START HTML HEADER CONTENTS***************-->

    <!--preloader-->
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i>
    </div>
    <!--preloader-->
    <header>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="logo">
				
					<?php 
						/*Getting  Logo Image*/
									// $logo_image=get_post_meta(4,"header_image",true);
									// $thumb = wp_get_attachment_image_src($logo_image, 'logo_size' );
					
					
					?>
					 <!--<a href="index.html"><img src="<?php //echo $url = $thumb['0'];?>">-->
					 
					 <a href="<?php echo site_url();?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/logo.png" alt="logo"></a> 
                </div>
                <div class="header_contact">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <div class="header_cntnt">
                        <p><span class="title"><?php the_field('phone_text',6); ?></span> <a href="tel:<?php the_field('phone_number',6); ?>"><?php the_field('phone_number',6); ?></a></p>
                        <p><span class="title"><?php the_field('toll_free',6); ?></span> <a href="tel:<?php the_field('toll_free_number',6); ?>"><?php the_field('toll_free_number',6); ?></a></p>
                    </div>
                </div>
                <div class="navigation">
                    <ul>
                        <?php

								$defaults = array(
								'theme_location'  => '',
								'menu'            => 'Header_menu',
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
                        <li><a href="https://www.facebook.com/DelphiaNorthAmerica" title=""><i class="fa fa-facebook" aria-hidden="true"></i>Follow</a>
                        </li>
                    </ul>
                </div>

            </div>
            <?php echo do_shortcode('[responsive-menu]'); ?>
        </nav>
        

    </header><!--header end-->
	
<!--**************END OF HTML HEADER CONTENTS***************-->