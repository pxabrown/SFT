<?php

/****************************************
Theme Setup
*****************************************/

require_once( get_template_directory() . '/lib/init.php' );
require_once( get_template_directory() . '/lib/theme-helpers.php' );
require_once( get_template_directory() . '/lib/theme-functions.php' );
require_once( get_template_directory() . '/lib/theme-comments.php' );
require_once( get_template_directory() . '/lib/theme-options.php' );
require_once( get_template_directory() . '/lib/bootstrap-walker.php' );
//require_once( get_template_directory() . '/lib/bootstrap-carousel.php' );

/****************************************
Require Plugins
*****************************************/

//require_once( get_template_directory() . '/lib/class-tgm-plugin-activation.php' );
//require_once( get_template_directory() . '/lib/theme-require-plugins.php' );

//add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/
add_theme_support( 'woocommerce' ); //WOOCOMMERCE SUPPORT


/************** SHIPPING DROP DOWN REMOVED ************/
/////// hide shipping drop down ////////////

// Hide standard shipping option when free shipping is available
add_filter( 'woocommerce_available_shipping_methods', 'hide_standard_shipping_when_free_is_available' , 10, 1 );
/**
 *  Hide Standard Shipping option when free shipping is available
 *
 * @param array $available_methods
 */
function hide_standard_shipping_when_free_is_available( $available_methods ) {
    if( isset( $available_methods['free_shipping'] ) AND isset( $available_methods['flat_rate'] ) ) {
        // remove standard shipping option
        unset( $available_methods['flat_rate'] );
    }
    return $available_methods;
} 
 
// AB - GOOGLE ANALYTICS

//wp_enqueue_style( ‘login’, get_stylesheet_directory_uri().’/login/login-styles.css’ );

//function custom_login_css() {
    //echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css" />'; 
    //}
    //add_action('login_head', 'custom_login_css');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Slyfox Threads';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function login_checked_remember_me() {
add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );

function rememberme_checked() {
echo "<script>document.getElementById('rememberme').checked = true;</script>";
}



// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 50;' ), 50 );


// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
woocommerce_related_products(6,1); // Display 4 products in rows of 2
}


// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}

/**
 * Define custom post type capabilities for use with Members
 */
//function mb_add_post_type_caps() {
	//mb_add_capabilities( 'portfolio' );
//}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}

/**
 * Remove auto p and br tags
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


//CUSTOM THEME ELEMENTS

//REMOVE SINGLE PRODUCT PAGE ACTIONS //

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

  
 
//ADD SINGLE PRODUCT PAGE ACTIONS//
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 60 );

add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_sharing', 50 );

 

// change add to cart text

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' ); // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' ); // 2.1 +
function woo_custom_cart_button_text() {
return __( 'add to bag', 'woocommerce' );
} 

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change product columns number on shop pages
 *
 */
function woo_product_columns_frontend() {
    global $woocommerce;

    // Default Value also used for categories and sub_categories
    $columns = 3;

    // Product List
    if ( is_product_category() ) :
        $columns = 3;
    endif;

    //Related Products
    if ( is_product() ) :
        $columns = 2;
    endif;

    //Cross Sells
    if ( is_checkout() ) :
        $columns = 4;
    endif;

	return $columns;
}

 /**
 * Remove product tabs
 *
 */
function woo_remove_product_tab($tabs) {

    unset( $tabs['description'] );      		// Remove the description tab
    unset( $tabs['reviews'] ); 					// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

 	return $tabs;
 
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tab', 98);