<?php
/**
 * Block Name: imgtext-item
 *
 *
 */
?>


<div class="textimg-item">
    <div class="textimg-block left">
        <div class="textimg-block image">
            <img src="<?= wp_get_attachment_url( get_field( 'image' ));?>">
        </div>
    </div>
    <div class="textimg-block right">
        <div class="textimg-subtitle">
            <?php echo get_field( 'subtitle' );?>
        </div>
        <div class="textimg-title"> 
            <?php echo get_field( 'title' );?>
        </div>
        <div class="textimg-repeater">
            <?php if(get_field( 'repeater' )): ?>
                <?php foreach(get_field( 'repeater' ) as $rep):?>
                    <div class="textimg-repeater-wrap">
                        <div class="textimg-repeater-num"><?= $rep['number'];?></div>
                        <div class="textimg-repeater-text"><?= $rep['text'];?></div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
         </div>
    </div>
</div>