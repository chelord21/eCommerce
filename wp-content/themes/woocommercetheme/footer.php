<footer class="site-footer">

    <!-- footer-widgets -->
    <div class="footer-widgets clearfix">

        <?php if (is_active_sidebar('footer1')) : ?>
            <div class="footer-widget-area">
            <?php dynamic_sidebar('footer1'); ?>
            </div><!-- /footer-widget-area -->
        <?php endif; ?>

        <?php if (is_active_sidebar('footer2')) : ?>
            <div class="footer-widget-area">
            <?php dynamic_sidebar('footer2'); ?>
            </div><!-- /footer-widget-area -->
        <?php endif; ?>

        <?php if (is_active_sidebar('footer3')) : ?>
            <div class="footer-widget-area">
            <?php dynamic_sidebar('footer3'); ?>
            </div><!-- /footer-widget-area -->
        <?php endif; ?>

        <?php if (is_active_sidebar('footer4')) : ?>
            <div class="footer-widget-area">
            <?php dynamic_sidebar('footer4'); ?>
            </div><!-- /footer-widget-area -->
        <?php endif; ?>
    
    </div><!-- /footer-widgets -->

<nav class="site-nav">
			<?php 
			$args = array(
				'theme_location' => 'footer'
			);

			?>

			<?php wp_nav_menu(   $args ); ?>
		</nav>


	<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>


</div><!-- container end -->

<?php wp_footer(); ?>
</body>
</html>

<script type='text/javascript'>
    jQuery(document).ready(function(){
        ajaxurl = <?php echo '"'.admin_url( 'admin-ajax.php' ).'"'.';'?>

        var data = {
            action: 'epicwebs_action',
            security: '<?php echo wp_create_nonce( "epicwebs-security" ); ?>',
            post_id: 1,
        };
        jQuery.post(ajaxurl, data, function(response) {
            json = jQuery.parseJSON(response);
            console.log(json);
        });
    });
</script>