<?php
/*
Template Name: Kids New Arrivals
*/
?>
<?php get_header(); ?>
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
<div class="row">
	<section id="main" role="main" class="col-xs-12">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', 'page' ); ?>

		<?php endwhile; ?>

 <section id="recent">

    <ul class="row-fluid">

        <?php
            $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'product_cat' => 'kids','orderby' =>'date','order' => 'DESC' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                    <li class="span3">    

                        <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>

                            <h3><?php the_title(); ?></h3>

                        	   <span class="price"><?php echo $product->get_price_html(); ?></span>

                        </a>

                        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                    </li><!-- /span3 -->
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </ul><!-- /row-fluid -->
</section><!-- /recent -->



	</section> <!-- /#main -->
</div>
<?php get_footer(); ?>
