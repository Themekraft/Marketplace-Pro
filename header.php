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
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://s.mlcdn.co/animate.css">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>


<div id="slidenav-wrap">

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

					<!-- The TK Icon Nav - large screens -->
					<ul class="tk-extra-nav navbar-nav nav">

						<?php if ( class_exists( 'BuddyPress' ) ) { ?>

							<?php global $bp; ?>

							<li>
								<a class="tk-notifications" href="<?php bp_loggedin_user_link(); ?>notifications">
									<i class="fa fa-bell"></i>
									<span class="tk-marker <?php if ( bp_has_notifications() ) { echo ' new '; } ?>"></span>
								</a>
							</li>

						<?php } ?>

						<?php if ( class_exists( 'WooCommerce' ) ) { ?>

							<?php global $woocommerce; ?>

							<li>
								<a class="tk-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
									<i class="fa fa-shopping-cart" style="font-size: 18px;"></i>
									<span class="tk-marker <?php if ( WC()->cart->get_cart_contents_count() != 0 ) { echo ' new '; } ?>"></span>
								</a>
							</li>
						<?php } ?>

						<?php if ( class_exists( 'BuddyPress' ) ) { ?>

							<li class="menu-item-has-children dropdown">
								<a class="tk-profile dropdown-toggle" href="<?php bp_loggedin_user_link(); ?>" data-toggle="dropdown" aria-haspopup="true">
									<?php bp_loggedin_user_avatar( 'type=full' ); ?>
								</a>
								<ul role="menu" class="dropdown-menu">

									<?php do_action( 'tk_dropdown_before_profile' ); ?>

									<li><a href="#" title="">My Profile</a></li>

									<?php do_action( 'tk_dropdown_after_profile' ); ?>

									<li><a href="#" title="">My Store Dashboard</a></li>

									<li><a href="#" title="">Account Settings</a></li>

									<?php do_action( 'tk_dropdown_after_account_settings' ); ?>

									<!-- <li class="divider"></li> -->
									<li><a href="#" class="lighter" title="">My Purchases</a></li>
									<li><a href="#" class="lighter" title="">My Products</a></li>
									<li><a href="#" class="lighter" title="">My Events</a></li>

								</ul>
							</li>

						<?php } ?>

					</ul>

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


	<div class="tk-icon-nav">
		<a class="tk-cart-nav" href="#"><i class="fa fa-shopping-cart"></i></a>
	</div>

	<a class="tf-burger"><span></span></a>

</header>

<?php do_action( 'tk_after_header' ); ?>

<div id="sitewrap">

	<div id="mainwrap">
