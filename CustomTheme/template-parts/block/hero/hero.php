<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

$i = 0;

?>
<div class="hero-wrapper">
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		<?php if( have_rows('repeater') ): ?>
			<div class="slider">
				<?php while( have_rows('repeater') ): the_row();
					$image = get_sub_field('images');
					$title = get_sub_field('title');
					$subtext = get_sub_field('subtext');
					$link = get_sub_field('button');
					$link_title = $link['title'];
					$link_url = $link['url'];
					$i++;
					$count = count(get_field('repeater'));
				?>
				<div class="sliderimg">
					<?= wp_get_attachment_image( $image['id'], 'full' ); ?>
						<div class="imgcounter">
							<div class="img-counter-wrap">
								<span class="imgcounter-num">
									<?php if($i < 10):?>
										0<?= $i?>
									<?php else:?>
										<?= $i?>
									<?php endif;?>
								</span>
								<div class="sumbigrod">
									<input type="range" disabled min="1" max="<?= max(array($count))?>" value="<?= $i?>" class="rangeslider" id="myRange">
								</div>
								<span class="imgcounter-num">
									<?php if( $count < 10):?>
										0<?= max(array($count))?>
									<?php else:?>
										<?= max(array($count))?>
									<?php endif;?>
								</span>
							</div>
						</div>
						<div class="hero-wrap content">
							<div class="hero-section-content-wrap">
								<div class="hero-title"><?= $title?></div>
								<div class="hero-subtext"><?= $subtext?></div>
								<div class="hero-button-wrap">
									<?php if( $link ): ?>
										<a class="hero-button" href="<?= $link_url ?>"><?= $link_title?></a>
									<?php endif; ?>
								</div>
								<div class="bottom-texts-wrap">
									<?php if(have_rows('bottom-texts') ):?>
										<?php while(have_rows('bottom-texts') ): the_row()?>
											<div class="hero-bottomtext"><?= get_sub_field('text')?></div>
										<?php endwhile;?>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>