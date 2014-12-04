<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- KIDS -->
    <div class="row">
    <div class="col-xs-12 col-sm-6 pull-left hp-block"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/kids/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-kids-nov-2014.jpg" alt=""></a> </div>
    
    <!-- WOMENS -->
    <div class="col-xs-12 col-sm-6 pull-righ hp-blockt"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/womens/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-womens-nov-2014.jpg" alt=""></a> </div>
    
    <div class="clearfix"></div>
    <div class="home_spacer"></div>
    
    <!-- ROW 2 --> 
    <!-- SHOP DEAL OF THE WEEK -->
    <div class="col-xs-12 col-md-4 hp-block"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shop-deal-of-the-week-by-cat.jpg" alt=""></a> </div>
    
    <!-- SHOP MENS -->
    <div class="col-xs-12 col-md-4 hp-block"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/mens/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-mens-nov-2014.jpg" alt=""></a> </div>
    
    <!-- SHOP ACCESSORIES -->
    <div class="col-xs-12 col-md-4 hp-block"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/accessories/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shop-accessories-by-cat.jpg" alt=""></a> </div>
    
    <div class="clearfix"></div>
    <div class="home_spacer"></div>
    <div class="col-sm-12 instagallery_btn_img"><a href="<?php echo esc_url( home_url( '/' ) ); ?>sftonyou/"><img class="hidden-xs" src="<?php echo get_stylesheet_directory_uri(); ?>/images/sftonyouinstagram-bottom-img.jpg" alt="">
    <img class="visible-xs" src="<?php echo get_stylesheet_directory_uri(); ?>/images/sftonyouinstagram-bottom-img.jpg" alt="">
    </a> </div>
<div class="clearfix"></div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
