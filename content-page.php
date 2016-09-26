<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $hide_pagetitle = get_post_meta( get_the_ID(), "tk-hide-page-title", true ); ?>
	<?php if( $hide_pagetitle != true ) { ?>
		<header>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
