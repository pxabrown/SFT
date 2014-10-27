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
  
    
  <!-- Styles -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<div id="wrap">
	

	
  
      <div class="topbar-main">
      <div class="container-fluid">
        <div class="row">
              	   <div class="col-md-4 hidden-xs">
              	    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
              	    </div>
      	    <div class="col-xs-12 col-md-2 pull-right">
      	   <?php if ( is_user_logged_in() ) { ?>
<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
<?php }
else { ?>
<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
<?php } ?>
          	    
      	     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cart-icon.png" alt="">
      	     
      <?php global $woocommerce; ?>

<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping bag', 'woothemes'); ?>">

<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
      	    </div>
        </div>
      </div>
</div>
<div class="clearfix"></div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="row">
      	    <div class="col-xs-9 col-md-12">
              <?php if ( get_theme_mod( 'header_image' )) { ?>
                  <div class='site-logo'>
                      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img src='<?php echo esc_url( get_theme_mod( 'header_image' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                      </a>
                  </div>
              <?php } else { ?>
                  <hgroup>
                      <div class='logo'>
                        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?>
                        </a>
                      </div>
                  </hgroup>
              <?php } ?>
              <?php if ( get_theme_mod( 'show_tagline' )) { ?>
                <p class="lead"><?php echo get_bloginfo ( 'description' );  ?></p>
              <?php } ?>
        	  </div>
        	  <div class="clearfix"></div>
        	  
<?php ubermenu( 'main' , array( 'menu' => 129 ) ); ?>
        	  
        	  
        </div>
    </div>

 
  
<?php if(is_front_page()) { ?>
<div class="big-wrapper">
 <div class="parallax-section-1"></div>
</div>
  
<!-- CAT - HEARING ENHANCEMENT -->
<?php } elseif (is_tax('product_cat', 'kids','')) { ?>
 <div class="cat_headaers hidden-xs"> <img src="<?php the_field('product_cat','hero_image'); ?>" /> </div>

<?php } elseif (is_tax('product_cat', 'boys','')) { ?>
 <div class="cat_headaers hidden-xs"> <img src="<?php the_field('product_cat','hero_image'); ?>" /> </div>

<? } elseif (is_tax('product_cat', 'mens')) { ?>
<div class="cat_headaers hidden-xs"> <img src="<?php the_field('product_cat','hero_image'); ?>" /> </div>

<? } elseif (is_tax('product_cat', 'womens')) { ?>
<div class="cat_headaers hidden-xs"> <img src="<?php the_field('product_cat','hero_image'); ?>" /> </div>



<?php } else { ?>
  
  <?php } ?>

<?php if(is_front_page()) { ?>
<?php } elseif (is_tax('product_cat')) { ?>

   <div id="container" class="collection-pages">
<?php } else { ?>
   
  <div id="container" class="container page-bumper">
  <?php } ?>

 
  
 