<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="social_share">
            <ul class="social_icons">
            
             <li class="pinterest"><a href="http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url=[http://slyfoxthreads.com]&is_video=false&description=[Slyfox Threads]"><img src="http://www.urbanoutfitters.com/images/pinterest.png" alt=""></li>
             <li class="twitter"><a href="http://twitter.com/home?status=Slyfox Threads+[URL]"><img src="http://www.urbanoutfitters.com/images/pinterest.png" alt=""></li>
             <li class="facebook"><a href="http://www.facebook.com/share.php?u=[URL]&title=[TITLE]"><img src="http://www.urbanoutfitters.com/images/pinterest.png" alt=""></li>
              
            </ul>
        </div>
    </div>
</div>