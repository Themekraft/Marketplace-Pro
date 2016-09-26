<?php
/**
 * The sidebar for the product single view
 *
 * @package Marketplace-Pro
 */
?>

	</div><!-- close .main-content-inner -->

	<?php
	// the sidebar will disappear below <992px screensize
	// to always show the sidebar just remove the classes hidden-xs hidden-sm ?>
	<div class="sidebar col-xs-12 col-md-3 col-lg-4 hidden-xs hidden-sm">

		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>

					<?php if ( ! dynamic_sidebar( 'sidebar-product' ) ) : ?>
						<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
						<?php endif; ?>
					<?php endif; ?>

		</div><!-- close .sidebar-padder -->
