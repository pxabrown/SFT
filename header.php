<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<script type="text/javascript">
var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true; js.id = 'AddShoppers';
js.src = ('https:' == document.location.protocol ? 'https://shop.pe/widget/' : 'http://cdn.shop.pe/widget/') + 'widget_async.js#5367d3afa3876458b769626b';
document.getElementsByTagName("head")[0].appendChild(js);
</script>
	<?php wp_head(); ?>
	<?php
	  // get options from theme
	  $options = get_option('theme_settings');
    //show tracking code for the header
    echo stripslashes($options['tracking']);
  ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div id="wrap">
	<?php $nav_class = (get_theme_mod('navbar_inverse') ? 'navbar-inverse' : 'navbar-default'); ?>
	<?php if(is_front_page()) { ?>
  <nav class="navbar <?php echo $nav_class ?> navbar-fixed-top" role="navigation">
  <?php } else { ?>
    <nav class="navbar" role="navigation">

  <?php } ?>
      <div class="topbar">
      <div class="container">
        <div class="row">
              	   <div class="col-md-4 hidden-phone hidden-xs">
              	    Free Shipping on all orders over $75 Limited Time!
              	    </div>
      	    <div class="col-xs-12 col-md-4 col-md-offset-4">
          	    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mag-glass.png" alt="">
      	     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cart-icon.png" alt="">
      	     
      <?php global $woocommerce; ?>

<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">

<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
      	    </div>
        </div>
      </div>
</div>
<div class="clearfix"></div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="row">
      	    <div class="col-xs-4 align-center">
              <?php if ( get_theme_mod( 'header_image' )) { ?>
                  <div class='site-logo'>
                      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img src='<?php echo esc_url( get_theme_mod( 'header_image' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                      </a>
                  </div>
              <?php } else { ?>
                  <hgroup>
                      <h1 class='site-title'>
                        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?>
                        </a>
                      </h1>
                  </hgroup>
              <?php } ?>
              <?php if ( get_theme_mod( 'show_tagline' )) { ?>
                <p class="lead"><?php echo get_bloginfo ( 'description' );  ?></p>
              <?php } ?>
        	  </div>
<!--
        	    <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
-->
         <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'slide collapse navbar-collapse navbar-1-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>


        </div>
      
           </div>
  </nav>
  
  <?php if(is_front_page()) { ?>
<div class="big-wrapper">
 <div class="parallax-section-1"></div>
</div>
  
         <!-- CAT - HEARING ENHANCEMENT -->
<?php } elseif (is_tax('product_cat', 'boys','')) { ?>
 
  <div class="big-wrapper">    

 <div class="parallax-section-category hidden-phone" style="background-image: url(<?php the_field('hero_image');?>) no-repeat;">
 <div class="container">
    <div class="row">
        <div class="col-md-5">
<h1 class='site-title'>
                        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php the_title(); ?>
                        </a>
                      </h1>
      
        </div>
    </div>
 </div>
 </div>
</div>


<? } elseif (is_tax('product_cat', 'microblast')) { ?>
<div class="cat_headaers hidden-phone"> <img src="<?php echo get_template_directory_uri(); ?>/images/cat_headers/microblast-header.jpg" /> </div>

         
     <?php } else { ?>
  
  <div class="block-spacer"></div>
  <?php } ?>























  
  <div id="container" class="container">
  
  