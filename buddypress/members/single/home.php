<div id="buddypress">

	<?php global $bp; // echo 'action:'.$bp->current_action; ?>

	<?php if ( bp_is_my_profile() ) { ?>
		<p id="back-to-dashboard"><a class="btn btn-primary btn-small" href="<?php echo home_url(); ?>" title="Take me home"><i class="fa fa-angle-left"></i> &nbsp;Dashboard</a></p>
	<?php } ?>

	<?php if ( $bp->current_component == 'profile' && $bp->current_action == 'public' ) { ?>

		<div id="item-header" role="complementary">

			<!-- <p id="publicprofilemsg"><i class="fa fa-info-circle"></i>&nbsp; This is your profile</p> -->

			<?php
			/**
			 * If the cover image feature is enabled, use a specific header
			 */
			if ( bp_displayed_user_use_cover_image_header() ) :
				bp_get_template_part( 'members/single/cover-image-header' );
			else :
				bp_get_template_part( 'members/single/member-header' );
			endif;
			?>

		</div><!-- #item-header -->

	<?php } ?>

	<div class="row tk-member-row">

		<div id="af-home-sidebar" class="col-xs-12 col-sm-4 col-md-3">

			<div id="profile-sidebar" class="af-dashboard-home-tile">

				<?php if ( bp_is_my_profile() ) { ?>

					<div class="af-home-welcome-card">
						<!-- <p style="color: #aaa; margin-bottom: 20px;">Great you're here again,</p> -->
						<div class="af-dashboard-avatar">
							<a href="<?php bp_displayed_user_link(); ?>" title="View my Profile">
								<?php bp_loggedin_user_avatar( 'type=full' ); ?>
							</a>
						</div>
						<div class="af-dashboard-username"><a href="<?php bp_loggedin_user_link(); ?>" title="View my Profile"><?php echo bp_get_user_firstname(); ?></a></div>
					</div>

				<?php } ?>

				<div id="item-nav">
					<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
						<ul>
							<?php if ( bp_is_my_profile() ) { ?>
								<?php get_template_part( 'tk-dashboard' ); ?>
							<?php } else { ?>
								<?php bp_get_displayed_user_nav(); ?>
							<?php } ?>
							<?php do_action( 'bp_member_options_nav' ); ?>
						</ul>
					</div>
				</div><!-- #item-nav -->

			</div>

		</div>

		<div id="item-body" role="main" class="col-xs-12 col-sm-8 col-md-9">

			<?php

			if ( bp_is_user_activity() || !bp_current_component() ) :
				bp_get_template_part( 'members/single/activity' );

			elseif ( bp_is_user_blogs() ) :
				bp_get_template_part( 'members/single/blogs'    );

			elseif ( bp_is_user_friends() ) :
				bp_get_template_part( 'members/single/friends'  );

			elseif ( bp_is_user_groups() ) :
				bp_get_template_part( 'members/single/groups'   );

			elseif ( bp_is_user_messages() ) :
				bp_get_template_part( 'members/single/messages' );

			elseif ( bp_is_user_profile() ) :
				bp_get_template_part( 'members/single/profile'  );

			elseif ( bp_is_user_forums() ) :
				bp_get_template_part( 'members/single/forums'   );

			elseif ( bp_is_user_notifications() ) :
				bp_get_template_part( 'members/single/notifications' );

			elseif ( bp_is_user_settings() ) :
				bp_get_template_part( 'members/single/settings' );

			// If nothing sticks, load a generic template
			else :
				bp_get_template_part( 'members/single/plugins'  );

			endif;

			 ?>

		</div><!-- #item-body -->

	</div>

</div><!-- #buddypress -->
