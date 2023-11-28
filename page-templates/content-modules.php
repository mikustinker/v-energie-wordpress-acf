<?php
/**
 * Template Name: Content Modules
 */

get_header();
global $post;
?>
<?php
if ( have_rows( 'modules' ) ) :
	while ( have_rows( 'modules' ) ) :
		the_row();
		$anchor_id = get_sub_field( 'anchor_id' );
		?>
		<?php if ( 'banner' == get_row_layout() ) :
			$background = get_sub_field( 'banner_background' );
			?>
			<!-- Banner Section -->
			<section class="banner" style="background-image: url(<?php echo esc_attr( $background['url'] ); ?>)">
				<div class="container">
					<?php
					get_template_part_args(
						'template-parts/content-modules-text',
						array(
							'v'  => 'banner_content',
							't'  => 'div',
							'tc' => 'banner-content',
						)
					);
					?>
					<div class="banner-form">
						<?php
						$shortcode = get_sub_field( 'banner_form' );
						echo do_shortcode( $shortcode );
						?>
					</div>
				</div>
			</section>
		<?php elseif ( 'media_content' == get_row_layout() ) :
			$image    = get_sub_field( 'image' );
			$video    = get_sub_field( 'video' );
			$position = get_sub_field( 'media_position' );
			$style    = get_sub_field( 'style' );
			$step     = get_sub_field( 'step' );
			?>
			<!-- Media Content Section -->
			<section class="media-content style--<?php echo esc_attr( $style ); ?>">
				<div class="container image--<?php echo esc_attr( $position ); ?>">
					<div class="media-content__media">
						<?php
						get_template_part(
							'template-parts/content-modules',
							'video',
							array(
								'image' => $image,
								'video' => $video,
							)
						);
						?>
						<?php if ( $image && $image['caption'] ) : ?>
							<h3 class="media-content__media__caption"><?php echo esc_html( $image['caption'] ); ?></h3>
						<?php endif; ?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v'  => 'image_cta',
								'c'  => 'media-content__media__cta btn btn--main'
							)
						);
						?>
					</div>
					<div class="media-content__content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'title',
								't'  => 'h2',
								'tc' => 'media-content__content__title'
							)
						);
						?>
						<?php if ( $style == 'step') : ?>
							<div class="media-content__content__step">
								<?php foreach ( $step as $ind => $item ) : ?>
									<div class="step-item">
										<div class="step-item__circle"></div>
										<h2 class="step-item__number h1"><?php echo esc_html( $ind + 1 ); ?></h5>
										<h5 class="step-item__title"><?php echo esc_html( $item['title'] ); ?></h5>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'description',
								't'  => 'div',
								'tc' => 'media-content__content__content'
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v'  => 'cta',
								'c' => 'media-content__content__cta btn'
							)
						);
						?>
					</div>
				</div>
			</section>
		<?php elseif ( 'carousel' == get_row_layout() ) :
			$iframe = get_sub_field( 'iframe' );
			?>
			<!-- Carousel Section -->
			<section class="carousel">
				<div class="container">
					<?php echo ( $iframe ); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
