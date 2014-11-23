<?php get_header(); ?>
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    		<div class="post" id="post-<?php the_ID(); ?>">
    
    			<div class="entry">
    
    				<?php the_content(); ?>

    				<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>
    				<!-- KIDS -->
    				<div class="col-xs-12 col-sm-6 pull-left">
        				 <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/kids/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-kids-nov-2014.jpg" alt=""></a>
    				</div>
    				<!-- WOMENS -->
    				<div class="col-xs-12 col-sm-6 pull-right">
        				 <a href="<?php echo esc_url( home_url( '/' ) ); ?>collection/womens/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-womens-nov-2014.jpg" alt=""></a>
    				</div>
    				<div class="clearfix"></div>
    				<div class="home_spacer"></div>
    				<!-- ROW 2 -->
    				<!-- SHOP DEAL OF THE WEEK -->
        				<div class="col-xs-12 col-md-4">
        				 <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shop-deal-of-the-week-by-cat.jpg" alt=""></a>
    				</div>
    				
                    <!-- SHOP MENS -->
                    <div class="col-xs-12 col-md-4">
        				 <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slyfoxthreads-shop-mens-nov-2014.jpg" alt=""></a>
    				</div>

    				
    				<!-- SHOP ACCESSORIES -->
    				<div class="col-xs-12 col-md-4">
        				 <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shop-accessories-by-cat.jpg" alt=""></a>
    				</div>
    				
    				<div class="clearfix"></div>
    				<div class="home_spacer"></div>
    				 <div class="col-sm-12 instagallery_btn_img"><a href="<?php echo esc_url( home_url( '/' ) ); ?>sftonyou/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sftonyouinstagram-bottom-img.jpg" alt=""></a>
    				 </div>
    
    
    		</div>
    
    		<?php endwhile; endif; ?>
      <div class="clearfix"></div>

<?php get_footer(); ?>
