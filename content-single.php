<?php
/**
 * @package _tk
 */
?>

		</div>
	</div>
</div>


<!-- <div id="single-post-img-wrap">
	<div class="container-flex">
		<?php // if ( has_post_thumbnail() ) : ?>
					<div class="entry-content-thumbnail featured-img-single-fixed" style="background: #000 url('<?php // the_post_thumbnail_url(); ?>') 0 0 scroll no-repeat; background-size: cover;">
					</div>
		<?php // endif; ?>
	</div>
</div> -->

<div class="container">

	<div class="row">
		<div class="col-xs-12 col-md-9 col-lg-8">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-content-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>

				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="post-date entry-meta">
						<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', '_tk' ) ); ?>

							<small class="cat-links" style="text-transform: uppercase;">
								<i class="fa fa-copy" style="margin-right: 4px; display: none;"></i>
								<?php

								if ( $categories_list && _tk_categorized_blog() ) :
									printf( __( '%1$s', '_tk' ), $categories_list );
								else:
									echo 'UNCATEGORISED';
								endif; // End if categories

								?>
							</small>

							<?php tk_posted_on(); ?>
					</div>
				<?php endif; ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- article -->
