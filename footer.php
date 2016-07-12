<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>

<?php // if you have a front-page.php, then enable the following line and line 19
			// if (!is_front_page()) { ?>

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->

<?php // } ?>

</div> <!-- close #mainwrap -->

<?php do_action('after_main_content'); ?>

<footer id="footer" class="site-footer" role="contentinfo">

	<?php if( is_active_sidebar( 'footer-column-1' ) || is_active_sidebar( 'footer-column-2' ) || is_active_sidebar( 'footer-column-3' ) || is_active_sidebar( 'footer-column-4' ) || ( !is_active_sidebar( 'footer-column-1' ) && current_user_can('edit_theme_options') )  ) : ?>

		<div id="footer-columns-wrap" class="footer-columns cc-footer">
			<div class="container">
				<div class="footer-columns-inner row">

					<div id="tk-footer-1" class="footer-column col-xs-12 col-sm-6 col-md-3">
						<div class="widgetarea">

							<?php if( !dynamic_sidebar( 'footer-column-1' ) && current_user_can('edit_theme_options') ) { ?>
								<p><a href="<?php echo admin_url('widgets.php') ?>">Add widgets</a></p>
							<?php } ?>

						</div>
					</div>

					<div id="tk-footer-2" class="footer-column col-xs-12 col-sm-6 col-md-3">
						<div class="widgetarea">

							<?php if( !dynamic_sidebar( 'footer-column-2' ) && current_user_can('edit_theme_options') ) { ?>
								<p><a href="<?php echo admin_url('widgets.php') ?>">Add widgets</a></p>
							<?php } ?>

						</div>
					</div>

					<div id="tk-footer-3" class="footer-column col-xs-12 col-sm-6 col-md-3">
						<div class="widgetarea">

							<?php if( !dynamic_sidebar( 'footer-column-3' ) && current_user_can( 'edit_theme_options' ) ) { ?>
								<p><a href="<?php echo admin_url('widgets.php') ?>">Add widgets</a></p>
							<?php } ?>

						</div>
					</div>

					<div id="tk-footer-4" class="footer-column col-xs-12 col-sm-6 col-md-3">
						<div class="widgetarea">

							<?php if( !dynamic_sidebar( 'footer-column-4' ) && current_user_can( 'edit_theme_options' ) ) { ?>
								<p><a href="<?php echo admin_url('widgets.php') ?>">Add widgets</a></p>
							<?php } ?>

						</div>
					</div>

				</div>
			</div>
		</div>

	<?php endif; ?>


	<div id="footer-last">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php echo get_bloginfo( 'name', 'display' ); ?>
					</a>

					<!-- The Footer Nav -->
					<?php wp_nav_menu(
						array(
							'theme_location' 	=> 'footer-nav',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'footernav',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'footer-menu-last',
							'walker' 			=> new wp_bootstrap_navwalker()
						)); ?>


					<ul class="social navbar-nav nav">
						<!-- Add social nav easily here with Font Awesome icons! -->
						<li><a href="#" target="_new" title="Your Brand on GitHub" alt="ThemeKraft on GitHub"><i class="fa fa-github"></i></a></li>
						<li><a href="#" target="_new" title="Your Brand on Twitter" alt="Your Brand on Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="_new" title="Your Brand on Facebook" alt="Your Brand on Instagram"><i class="fa fa-instagram"></i></a></li>
					</ul>

				</div>
			</div>
		</div>

	</div>

</footer><!-- close #colophon -->

</div><!-- #sitewrap -->

<?php wp_footer(); ?>

</body>
</html>
