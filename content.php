<?php
/**
 * @package _tk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Read more">
					<div class="entry-content-thumbnail" style="background: #000 url('<?php the_post_thumbnail_url(); ?>') 0 0 scroll no-repeat; background-size: cover;">
					</div>
				</a>
		<?php endif; ?>

		<div class="col-xs-12">
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="post-date entry-meta"><?php tk_posted_on(); ?></div>
			<?php endif; ?>

			<header>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Read more"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<p class="readmore"><a class="btn btn-primary btn-small" title="Read More" href="<?php the_permalink(); ?>"><i class="fa fa-plus-circle"></i> &nbsp;Read More</a></p>

			<footer class="entry-meta">
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', '_tk' ) );
						if ( $categories_list && _tk_categorized_blog() ) :
					?>
					<small class="cat-links">
						<?php printf( __( 'Posted in %1$s', '_tk' ), $categories_list ); ?>
					</small>
					<?php endif; // End if categories ?>

				<?php endif; // End if 'post' == get_post_type() ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span><small class="comments-link"><?php comments_popup_link( __( 'Leave a comment', '_tk' ), __( '1 Comment', '_tk' ), __( '% Comments', '_tk' ) ); ?></small></span>
				<?php endif; ?>

				<?php // edit_post_link( __( 'Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

		</div>
	</div><!-- .row -->
</article><!-- #post-## -->
