<?php
	// title animation
	$title_animation = ( $settings['title_animation'] ) ? 'uk-scrollspy="cls:uk-animation-' . $settings['title_animation'] . ';"' : '';
	// title alignment
	$title_alignment = ( $settings['title_alignment'] ) ? $settings['title_alignment'] : '';

	// Alignment
	$content_position = ( $settings['media_alignment'] == 'right' ) ? 'uk-flex-last@s' : '';
	// items animation
	$items_animation = ( $settings['item_animation'] ) ? 'uk-scrollspy="cls:uk-animation-' . $settings['item_animation'] . ';target:> .uk-card; delay:200;"' : '';
	// Arguments
	$args = array(
		'posts_per_page'   => $contents['total_posts'],
		'cat'         => $contents['category'],
	);
	// Build query
	$query = new WP_Query( $args );
?>

<section id="<?php echo $id; ?>" class="fp-section blogs blog-1 uk-padding-small">
	<div class="uk-section">
		<div class="uk-container">
			<div class="section-heading uk-text-<?php echo $title_alignment; ?>">
				<?php if ( $contents['title'] ) : ?>
				  <!-- Section Title -->
					  	<?php 
							echo op_heading(
								$contents['title'],
								$settings['heading_type'],
								'uk-heading-primary uk-text-'.$settings['title_transformation'],
								$title_animation
							); 
						?>
				<?php endif; ?>

				<?php if ( $contents['description'] ) : ?>
					<div class="uk-text-lead" <?php echo ( $settings['title_animation'] ? $title_animation . 'delay:300"' : '' ); ?>><?php echo $contents['description']; ?></div>
				<?php endif; ?>
			</div> <!-- Section heading -->

			<!-- WP Posts -->
			<div <?php echo $items_animation; ?>>
				<?php if ( $query->have_posts() ) : ?>
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="uk-card uk-child-width-1-2@s uk-margin" uk-grid>
							<?php if ( $contents['thumbnail_enable'] ) : ?>
								<div class="post-thumb uk-card-media-<?php echo $settings['media_alignment']; ?> <?php echo $content_position; ?>">
									<a href="<?php the_permalink(); ?>">
										<figure>
											<?php the_post_thumbnail( '', array('', '') ); ?>
										</figure>
									</a>
								</div> <!-- blog-thumb -->
							<?php endif; ?>

							<div class="uk-grid-item-match uk-flex-middle uk-padding-remove">
								<div class="uk-card-body">
									<h2 class="uk-card-title uk-text-<?php echo $settings['item_title_transformation']; ?>">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>

								<p class="uk-text-small">
									<?php op_the_excerpt( $contents['text_limit'] ); ?>
								</p>

								<?php if ( $contents['readmore_text'] ) : ?>	
									<a class="uk-button-text" href="<?php the_permalink(); ?>"><?php echo $contents['readmore_text']; ?></a>
								<?php endif; ?>
								</div>
							</div>
						</div> <!-- uk-grid-items -->
					<?php endwhile; ?>
					<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div> <!-- uk-grid -->
		</div><!-- uk-container -->
	</div> <!-- uk-section -->
</section> <!-- end-section -->
