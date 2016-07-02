<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _tk
 */
?>

	</div><!-- close .main-content-inner -->

	<?php
	// the sidebar will disappear below <992px screensize
	// to always show the sidebar just remove the classes hidden-xs hidden-sm ?>
	<div class="sidebar col-xs-12 col-md-3 col-lg-4 hidden-xs hidden-sm">

		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>

					<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
					<?php endif; ?>

		</div><!-- close .sidebar-padder -->
