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

// Hide ALL shipping options when free shipping is available
add_filter( 'woocommerce_available_shipping_methods', 'hide_all_shipping_when_free_is_available' , 10, 1 );
 
/**
* Hide ALL Shipping option when free shipping is available
*
* @param array $available_methods
*/
function hide_all_shipping_when_free_is_available( $available_methods ) {
 
  	if( isset( $available_methods['free_shipping'] ) ) :
		
		// Get Free Shipping array into a new array
		$freeshipping = array();
		$freeshipping = $available_methods['free_shipping'];
 
		// Empty the $available_methods array
		unset( $available_methods );
 
		// Add Free Shipping back into $avaialble_methods
		$available_methods = array();
		$available_methods[] = $freeshipping;
 
	endif;
 
	return $available_methods;
}

/**
 * Change the add to cart text on single product pages
 */
function woo_custom_cart_button_text() {
	return __('Add to Bag', 'woocommerce');
}
add_filter('single_add_to_cart_text', 'woo_custom_cart_button_text');



/**
 * Change the add to cart text on product archives
 */
function woo_archive_custom_cart_button_text() {
	return __( 'My Button Text', 'woocommerce' );
}
add_filter( 'add_to_cart_text', 'woo_archive_custom_cart_button_text' );

//Change add to cart - to - add to bag
/**
 * Custom Add To Cart Messages
 * Add this to your theme functions.php file
 **/
add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
	global $woocommerce;
 
	// Output success messages
	if (get_option('woocommerce_cart_redirect_after_add')=='yes') :
 
		$return_to 	= get_permalink(woocommerce_get_page_id('shop'));
 
		$message 	= sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Rad! Product successfully added to your bag.', 'woocommerce') );
 
	else :
 
		$message 	= sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(woocommerce_get_page_id('cart')), __('View Bag &rarr;', 'woocommerce'), __('Product successfully added to your bag.', 'woocommerce') );
 
	endif;
 
		return $message;
}

/*
 * Hide "Products" in WooCommerce breadcrumb
 */
function woo_custom_filter_breadcrumbs_trail ( $trail ) {
  foreach ( $trail as $k => $v ) {
    if ( strtolower( strip_tags( $v ) ) == 'products' ) {
      unset( $trail[$k] );
      break;
    }
  }

  return $trail;
}

add_filter( 'woo_breadcrumbs_trail', 'woo_custom_filter_breadcrumbs_trail', 10 );



/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Add payment method to admin new order email
 *
 */
add_action( 'woocommerce_email_after_order_table', 'woo_add_payment_method_to_admin_new_order', 15, 2 ); 

function woo_add_payment_method_to_admin_new_order( $order, $is_admin_email ) { 
	if ( $is_admin_email ) { 
	echo '<p><strong>Payment Method:</strong> ' . $order->payment_method_title . '</p>'; 
	} 
}

add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
woocommerce_related_products(6,6); // Display 4 products in rows of 2
}

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>




<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping bag', 'woothemes'); ?>"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}

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
//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


//CUSTOM THEME ELEMENTS

//REMOVE SINGLE PRODUCT PAGE ACTIONS //

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

 
//ADD SINGLE PRODUCT PAGE ACTIONS//
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 80 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 60 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 80 );

 /**
 * Remove product tabs
 *
 */
function woo_remove_product_tab($tabs) {
    //unset( $tabs['description'] );      		// Remove the description tab
    //unset( $tabs['reviews'] ); 					// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
 	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tab', 98);

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}

}



// Place the following code in your theme's functions.php file
// override the quantity input with a dropdown
function woocommerce_quantity_input() {
global $product;
$defaults = array(
'input_name' => 'quantity',
'input_value' => '1',
'max_value' => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
'min_value' => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
'step' => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
'style'	=> apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
);
if ( ! empty( $defaults['min_value'] ) )
$min = $defaults['min_value'];
else $min = 1;
if ( ! empty( $defaults['max_value'] ) )
$max = $defaults['max_value'];
else $max = 10;
if ( ! empty( $defaults['step'] ) )
$step = $defaults['step'];
else $step = 1;
$options = '';
for ( $count = $min; $count <= $max; $count = $count+$step ) {
$options .= '<option value="' . $count . '">' . $count . '</option>';
}
echo '<div class="quantity_select" style="' . $defaults['style'] . '"><div class="qty_right">Qty</div> <select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty select-div">' . $options . '</select></div>';
}
 

//ADD SHARE FEATURES
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
//remove sharing btns from default location to under the meta on product details page 
add_action( 'loop_start', 'jptweak_remove_share' );

add_action( 'wp_print_scripts', 'avf_descript_cart_fragments', 100 );

function avf_descript_cart_fragments() {
    wp_dequeue_script( 'wc-cart-fragments' );
    return true;
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['shipping']['shipping_company']);

     return $fields;
}

/* remove single product sidebar */
// add this code directly, no action needed
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/* REGISTER WIDGETS ------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Footer Col 1',
        'id'   => 'footer-col-1-widget',
        'description'   => 'Col 1 Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Footer Col 2',
        'id'   => 'footer-col-2-widget',
        'description'   => 'Col 2 Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    
     register_sidebar(array(
        'name' => 'Footer Col 3',
        'id'   => 'footer-col-3-widget',
        'description'   => 'Col 3 Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Footer Col 4',
        'id'   => 'footer-col-4-widget',
        'description'   => 'Col 4 Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Terms Block',
        'id'   => 'footer-terms-block-widget',
        'description'   => 'Footer terms block widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}
// add this code directly, no action needed
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );