<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>
<?php wp_title(''); ?>
</title>
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
<?php wp_head(); ?>

<!-- Styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true"> Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
<div id="wrap">
<div class="topbar-main hidden-xs">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-3 hidden-xs">
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <?php if ( get_theme_mod( 'header_image' )) { ?>
        <div class='site-logo'> <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <img src='<?php echo esc_url( get_theme_mod( 'header_image' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'> </a> </div>
        <?php } else { ?>
        <hgroup>
          <div class='logo'> <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
            <?php bloginfo( 'name' ); ?>
            </a> </div>
        </hgroup>
        <?php } ?>
        <?php if ( get_theme_mod( 'show_tagline' )) { ?>
        <p class="lead"><?php echo get_bloginfo ( 'description' );  ?></p>
        <?php } ?>
      </div>
      <div class="col-xs-5 col-sm-3 col-md-2 pull-right mini_menu">
        <?php if ( is_user_logged_in() ) { ?>
        <a class="hidden-xs" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>">
        <?php _e('My Account','woothemes'); ?>
        </a>
        <?php }
else { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
        <?php _e('Login / Register','woothemes'); ?>
        </a>
        <?php } ?>
        <?php global $woocommerce; ?>
        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping bag', 'woothemes'); ?>"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cart-icon.png" alt=""> (<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>)</a> </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="container">
  <div class="row">
    <div class="hidden-xs">
      <?php ubermenu( 'main' , array( 'menu' => 129 ) ); ?>
    </div>
  </div>
</div>
<?php if(is_front_page()) { ?>
<div class="big-wrapper">

<a href="#"><div class="home_hero hidden-xs" style="background:url(<?php the_field('home_hero'); ?>) no-repeat top center ; 
    margin:0px; 
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
</div></a>
</div>
<?php } elseif ( is_tax ( 'product_cat', 'kids' ) ) { ?>
<div class="cat_headers" style="background:url(<?php the_field('cat_header','product_cat_130'); ?>)  no-repeat top center ; margin:0px; 
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
"></div>
<?php } elseif (is_tax('product_cat', 'mens')) { ?>
<div class="cat_headers" style="background:url(<?php the_field('cat_header','product_cat_146'); ?>)  no-repeat top center ; margin:0px;
"></div>
<?php } else { ?>
<?php } ?>
<?php if(is_front_page()) { ?>
<div id="container" class="container page-bumper">
<?php } elseif (is_tax('product_cat')) { ?>
<div id="container" class="container page-bumper">
<?php } elseif (is_page('cart')) { ?>
<div id="container" class="container page-bumper">
<?php } else { ?>
<div id="container" class="container page-bumper">
<?php } ?>
