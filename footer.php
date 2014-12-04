<?php $footer_class = (get_theme_mod('footer_inverse') ? 'inverse' : 'default'); ?>
<footer id="footer" class="<?php echo $footer_class; ?>">
		<?php dynamic_sidebar( 'Footer' ); ?>
		<div class="footer-menu-block center-widget">
    		<div class="col-md-2 col-sm-12">
    		<?php dynamic_sidebar('footer-col-1-widget'); ?>
    		</div>
    		<div class="col-md-2 col-sm-12">
    		<?php dynamic_sidebar('footer-col-2-widget'); ?>
    		</div>
    		<div class="col-md-5 col-sm-12">
    		<?php dynamic_sidebar('footer-col-3-widget'); ?>
    		</div>
    		<div class="col-md-3 col-sm-12">
    		<?php dynamic_sidebar('footer-col-4-widget'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row">
    		<?php dynamic_sidebar('footer-terms-block-widget'); ?>
    		<div class="clearfix"></div>
    		<div class="copyright col-md-12">
                &copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?> is a registered trademark of Slyfox Threads, LLC. All Rights reserved 
    		</div>
		</div>
</footer>
</div> <!-- /.container -->
</div> <!-- /#wrap -->
<?php wp_footer(); ?>
</body>
</html>