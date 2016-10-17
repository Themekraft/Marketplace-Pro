<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>


<div id="slidenav-wrap">

	<?php if ( class_exists( 'BuddyPress' ) ) { ?>
		<div class="slidenav-welcome">
			<p class="slidenav-avatar">
				<a href="<?php bp_loggedin_user_link(); ?>" title="<?php echo bp_core_get_user_displayname( bp_loggedin_user_id() ); ?>">
					<?php bp_loggedin_user_avatar( 'type=full' ); ?>
					<span class="slidenav-profile-link">
						<?php do_action( 'slidenav_avatar_before_username' ); ?>
						<?php echo bp_core_get_user_displayname( bp_loggedin_user_id() ); ?>
					</span>
				</a>
			</p>
		</div>
	<?php } ?>

	<!-- The Slide Nav -->
	<?php wp_nav_menu(
		array(
			'theme_location' 	=> 'slide-nav',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'slidenav',
			'menu_class' 		=> 'nav navbar-nav',
			'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
			'menu_id'			=> 'main-menu',
			'walker' 			=> new wp_bootstrap_navwalker()
		)); ?>

</div>

<header id="topnav">
	<div class="container nopad">
		<div class="row">
			<div class="col-xs-12">

				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php echo get_bloginfo( 'name', 'display' ); ?>
				</a>

				<div class="tk-menu-group">


					<?php if ( class_exists( 'BuddyPress' ) || class_exists( 'WooCommerce' ) ) { ?>

						<!-- The TK Icon Nav - large screens -->
						<ul class="tk-extra-nav navbar-nav nav">

							<?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ) { ?>

								<?php global $bp; ?>

								<?php if ( bp_is_active( 'messages' ) ) { ?>
									<li class="tk-messages-li">
										<a class="tk-messages <?php if ( messages_get_unread_count() > 0 ) { echo ' new '; } ?>" href="<?php bp_loggedin_user_link(); ?>messages">
											<i class="fa fa-comment"></i>
											<span class="tk-marker <?php if ( messages_get_unread_count() > 0 ) { echo ' new '; } ?>"></span>
										</a>
									</li>
								<?php } ?>

								<li class="tk-notifications-li">
									<a class="tk-notifications <?php if ( bp_has_notifications() ) { echo ' new '; } ?>" href="<?php bp_loggedin_user_link(); ?>notifications">
										<i class="fa fa-bell"></i>
										<span class="tk-marker <?php if ( bp_has_notifications() ) { echo ' new '; } ?>"></span>
									</a>
								</li>

							<?php } ?>

							<?php if ( class_exists( 'WooCommerce' ) && is_user_logged_in() ) { ?>

								<?php global $woocommerce; ?>

								<li class="tk-cart-li">
									<a class="tk-cart <?php if ( WC()->cart->get_cart_contents_count() != 0 ) { echo ' new '; } ?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
										<i class="fa fa-shopping-cart"></i>
										<span class="tk-marker <?php if ( WC()->cart->get_cart_contents_count() != 0 ) { echo ' new '; } ?>"></span>
									</a>
								</li>

							<?php } ?>


							<?php if ( class_exists( 'BuddyPress' ) && is_user_logged_in() ) { ?>

								<li class="tk-profile-li menu-item-has-children dropdown">
									<a class="tk-profile dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true">
										<?php bp_loggedin_user_avatar( 'type=full' ); ?>
									</a>
									<ul role="menu" class="dropdown-menu">

										<?php do_action( 'tk_dropdown_first' ); ?>


										<li><a href="<?php echo home_url(); ?>" class="xlighter" title="">Dashboard</a></li>

										<?php if( defined('WCV_VERSION') ) { ?>
												<?php if ( current_user_can( 'vendor' ) ) : ?>
														<li><a href="<?php bp_loggedin_user_link(); ?>vendor-dashboard/vendor-dashboard-products/edit/" class="xlighter" title="">Add Product</a></li>
														<!-- <li><a href="#" class="xlighter" title="">My Products</a></li> -->
												<?php endif; ?>
										<?php } ?>

										<li><a href="/events/community/add" class="xlighter" title="">Add Event</a></li>
										<!-- <li><a href="/events/community/list" class="xlighter" title="">My Events</a></li> -->

										<?php if ( ! current_user_can( 'vendor' ) ) : ?>
											<li><a href="/sell-your-products/" class="xlighter" title="">Open Your Store</a></li>
										<?php endif; ?>




										<li><a href="<?php bp_loggedin_user_link(); ?>" class="lighter" title="">My Profile</a></li>

										<li><a href="<?php bp_loggedin_user_link(); ?>settings" class="lighter" title="">Account Settings</a></li>
										<?php do_action( 'tk_dropdown_before_logout' ); ?>
										<li><a href="<?php echo wp_logout_url( home_url() ); ?>" class="lighter" title="">Logout</a></li>

										<?php do_action( 'tk_dropdown_last' ); ?>

									</ul>
								</li>

							<?php } ?>

						</ul>

					<?php } ?>



					<!-- The Primary Nav - Top Nav -->
					<?php wp_nav_menu(
						array(
							'theme_location' 	=> 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => '',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'main-menu',
							'walker' 			=> new wp_bootstrap_navwalker()
						)
					); ?>



				</div>

			</div>
		</div>
	</div>


	<a class="tf-burger"><span></span></a>

</header>

<?php do_action( 'tk_after_header' ); ?>

<div id="sitewrap">

	<div id="mainwrap">
