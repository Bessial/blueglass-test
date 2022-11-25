<?php
/**
 * Block Name: Accordion
 *
 *
 */

 /**
 * 
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>  
<div class="accordion-wrap">    
    <div class="accordion-wrap-left">
        <div class="left-subtitle">
            <?= get_field('left_subtitle')?>
        </div>
        <div class="left-title">
            <?= get_field('left_title')?>
        </div>
    </div>
    <div class="accordion-wrap-right">
        <div class="accordion-repeaters">
            <?php if(get_field('right_repeater')):?>
                <?php foreach(get_field('right_repeater') as $rrep):?>
                    <div class="repeater-wrap">
                        <div class="accordion-repeater-title"><?= $rrep['title'];?></div>
                        <div class="accordion-repeater-text"><?= $rrep['text'];?></div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>