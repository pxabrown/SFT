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
