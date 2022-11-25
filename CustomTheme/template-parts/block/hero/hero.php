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
				 $i++;$a = array($i)?>
				
					<div class="sliderimg">
					<?= wp_get_attachment_image( $image['id'], 'full' ); ?>
						<div class="imgcounter">
							<?php if($i == 1): ?>
								<span class="imgcounter-num">0<?= $i?></span>
								<div class="sumbigrod">
									<div class="imgthingie num-<?= $i?>">
									</div>
								</div>
								<span class="imgcounter-num">03</span>
							<?php elseif($i == 2):?>
								<span class="imgcounter-num">0<?= $i?></span>
								<div class="sumbigrod">
									<div class="imgthingie num-<?= $i?>">
									</div>
								</div>
								<span class="imgcounter-num">03</span>
							<?php elseif($i == 3):?>
								<span class="imgcounter-num">0<?= $i?></span>
								<div class="sumbigrod">
									<div class="imgthingie num-<?= $i?>">
									</div>
								</div>
								<span class="imgcounter-num">03</span>
							<?php endif;?>
						</div>
						<div class="hero-wrap content">
						

							<div class="hero-title"><?= $title?></div>
							<div class="hero-subtext"><?= $subtext?></div>
							<div class="hero-button-wrap">
								<?php if( $link ): ?>
									<a class="hero-button" href="<?= $link_url ?>"><?= $link_title?></a>
								<?php endif; ?>
							</div>
							<?php if(have_rows('bottom-texts') ):?>
								<?php while(have_rows('bottom-texts') ): the_row()?>
									<div class="hero-bottomtext"><?= get_sub_field('text')?></div>
								<?php endwhile;?>
							<?php endif;?>
						</div>
					</div>
					
				<?php endwhile; ?>
			</div>

		
		<?php endif; ?>
	</div>
</div>