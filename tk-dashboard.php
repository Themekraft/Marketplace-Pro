<?php
// THE USER DASHBOARD
// this is the homepage template for logged in users ?>

<?php if ( ! class_exists( 'BuddyPress' ) ) : ?>

      <?php return; ?>

<?php else: ?>

<?php global $bp; ?>

    <div class="bp-user">

      <div id="buddypress">

          <div id="dashboard-main" class="homesection">
            <div class="container">
              <div class="row">

                <div id="af-home-sidebar" class="col-xs-12 col-sm-4 col-md-3">

                  <div id="profile-sidebar" class="af-dashboard-home-tile">

                    <div class="af-home-welcome-card">
                      <div class="af-dashboard-avatar">
                        <a href="<?php bp_displayed_user_link(); ?>" title="View my Profile">
                          <?php bp_loggedin_user_avatar( 'type=full' ); ?>
                        </a>
                      </div>
                      <div class="af-dashboard-username"><a href="<?php bp_loggedin_user_link(); ?>" title="View my Profile"><?php echo bp_get_user_firstname(); ?></a></div>
                    </div>

                    <div id="item-nav">
                      <div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
                        <ul>
                          <?php bp_get_loggedin_user_nav(); ?>
                          <?php do_action( 'bp_member_options_nav' ); ?>
                        </ul>
                      </div>
                    </div><!-- #item-nav -->

                  </div>

                </div>



                <div id="af-home-main" class="col-xs-12 col-sm-8 col-md-9">

                  <?php if ( current_user_can( 'vendor' ) ): ?>
                    <div class="af-wc-vendor-dashboard-home af-dashboard-home-tile">
                      <h3>My Store</h3>
                      <p class="af-homedash-action">
                        <a class="btn tile-btn" href="<?php bp_loggedin_user_link(); ?>vendor-dashboard/" title="Store Dashboard"><i class="fa fa-tachometer"></i>&nbsp;&nbsp;Store&nbsp;Dashboard</a>
                        <a class="btn tile-btn" href="#" title="My Store"><i class="fa fa-home"></i>&nbsp;&nbsp;My&nbsp;Store</a>
                        <a class="btn tile-btn" href="<?php bp_loggedin_user_link(); ?>vendor-dashboard/vendor-dashboard-products/" title="My Products"><i class="fa fa-tags"></i>&nbsp;&nbsp;My&nbsp;Products</a>
                        <a class="btn tile-btn" href="<?php bp_loggedin_user_link(); ?>vendor-dashboard/vendor-dashboard-products/edit/" title="Add Product"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add&nbsp;Product</a>
                      </p>
                      <div><?php echo do_shortcode('[wcv_pro_dashboard]'); ?></div>
                    <div>

                    </div></div><?php // bug of WC Vendors? Have to close two divs when adding their shortcode.. ?>
                  <?php endif; ?>

                    <div class="af-events-dashboard-home af-dashboard-home-tile">
                      <h3>My Events</h3>
                      <p class="af-homedash-action">
                        <a class="btn tile-btn" href="/events/community/list" title="My Events"><i class="fa fa-calendar"></i>&nbsp;&nbsp;My&nbsp;Events</a>
                        <a class="btn tile-btn" href="/events/community/add" title="Add Event"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add&nbsp;Event</a>
                      </p>
                      <?php if ( current_user_can( 'vendor' ) ): ?>
                        <div class="alert alert-success" style="margin-top: 20px;"><i class="fa fa-check"></i> &nbsp;&nbsp;<b>You can sell event tickets now!</b><br />Simply add an event and fill out the ticket section.</div>
                      <?php else: ?>
                        <div class="well well-alt" style="margin-top: 20px;"><i class="fa fa-question-circle"></i> &nbsp;&nbsp;Wanna sell tickets? <a class="" href="/sell-tickets/" style="">Learn More</a></div>
                      <?php endif; ?>
                    </div>


                    <?php if ( !current_user_can( 'vendor' ) ): ?>
                      <div class="af-wc-vendor-start af-dashboard-home-tile">
                        <h3>Open Your Online Store For Free!</h3>
                        <p>You have awesome products for Martial Arts enthusiasts?</p>
                        <p>Start adding your first product or event ticket here today and earn more money!</p>
                        <p>It only takes 1 click, and <b>it's free.</b> </p>
                        <p class="af-homedash-action"><a class="btn tile-btn" href="/sell-your-products" title="Open Your Store - Become A Vendor"><i class="fa fa-money"></i>&nbsp;&nbsp;Open&nbsp;Your&nbsp;Store</a></p>
                      </div>
                    <?php endif; ?>

                </div>



              </div>
            </div>
          </div>

        </div>
      </div>

<?php endif; ?>
