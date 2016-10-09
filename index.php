<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>

<div class="main-content">
  <div class="container">
    <div class="row">

			<div id="content" class="main-content-inner col-xs-12">

				<?php if ( have_posts() ) : ?>

          <div class="row">

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                  <?php get_template_part( 'content-3-col', get_post_format() ); ?>

            <?php endwhile; ?>

              <?php _tk_content_nav( 'nav-below' ); ?>

          </div>


					<?php _tk_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
