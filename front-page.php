<?php
/**
 * The Front Page
 * This template handles what to show on the homepage
 *
 */

get_header(); ?>

<?php if ( !is_user_logged_in() ): ?>

  <div class="main-content">
    <div class="container">
      <div class="row">

  			<div id="content" class="main-content-inner col-xs-12">

  				<?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'content', 'page' ); ?>

    					<?php // If comments are open or we have at least one comment, load up the comment template
    						if ( comments_open() || '0' != get_comments_number() )
    							comments_template(); ?>

  				    <?php endwhile; // end of the loop. ?>

<?php else: ?>

    <?php get_template_part( 'dashboard' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
