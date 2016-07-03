<?php
/**
 * The template used for displaying a BuddyPress member profile
 *
 * @package _tk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content member-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
