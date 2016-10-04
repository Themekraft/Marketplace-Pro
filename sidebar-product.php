<?php
/**
 * The sidebar for the product single view
 *
 * @package Marketplace-Pro
 */
?>

		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>

					<?php if ( ! dynamic_sidebar( 'sidebar-product' ) ) : ?>
						<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
						<?php endif; ?>
					<?php endif; ?>

		</div><!-- close .sidebar-padder -->
