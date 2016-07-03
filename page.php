<?php
/**
 * The default template for displaying all pages.
 * Default is fullwidth, use the page template "Sidebar Right" (when editing the page in your wp-admin) if you want to display a sidebar with your page
 *
 * @package _tk
 */

get_header(); ?>

<div class="main-content">
  <div class="container">
    <div class="row">

			<div id="content" class="main-content-inner col-xs-12">

				<?php while ( have_posts() ) : the_post(); ?>

          <?php
              // check if we are on a BuddyPress member profile
              if( bp_is_user() ) {
    					  get_template_part( 'content', 'member' );
              } else {
      					get_template_part( 'content', 'page' );
      				}
      		?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>

				<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
