<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === DECKBLATT-TOP === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$heading = get_field('heading');
$text = get_field('text');

$imgs = get_field('imgs');
$img_big = $imgs['img_big'];
$img_small = $imgs['img_small'];
$pictogramm = $imgs['pictogramm'];

?>

<div class="section overview-page-top <?php echo $bg_color; ?>">
    <div class="section__container">
            <div class="row align-items-end">
                <?php if( isset($img_big) && !empty($img_big) ){ ?>
                    <div class="col-12 col-sm-8 px-sm-0 mb-5 mb-lg-6 mb-xl-7 mb-xxxl-8">
                        <?php echo wp_get_attachment_image($img_big, 'full'); ?>
                    </div>
                <?php } ?>
                
                <?php if( isset($pictogramm) && !empty($pictogramm) ){ ?>
                    <div class="pictogramm d-none d-sm-flex col-12 col-sm-4 mbn-md-4 mbn-xl-5 ps-sm-4 pe-sm-4 ps-lg-0 pe-lg-5 pe-xl-7 pe-xxl-9 pe-xxxl-11">
                        <?php echo wp_get_attachment_image($pictogramm, 'full'); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="row <?php echo $classes; ?>">
                <?php if( !empty($heading) ){ ?>
                    <h1 class="col-12 col-md-7 heading-lg mb-4 mb-md-5 mb-lg-6 mb-xl-7 mb-xxxl-8 ps-lg-5 pe-lg-5 ps-xl-7 pe-xl-7 ps-xxl-9 pe-xxl-8 ps-xxxl-11 pe-xxxl-9">
                        <?php echo $heading; ?>
                    </h1>
                <?php } ?>
                <?php if( !empty($text) ){ ?>
                    <div class="text-content col-12 col-md-6 col-lg-7 mb-4 mb-md-0 ps-lg-5 pe-lg-5 ps-xl-7 pe-xl-7 ps-xxl-9 pe-xxl-8 ps-xxxl-11 pe-xxxl-9">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <?php if( isset($img_small) && !empty($img_small) ){ ?>
                    <div class="col-12 col-md-6 col-lg-5 ps-lg-0 pe-lg-0">
                        <?php echo wp_get_attachment_image($img_small, 'full'); ?>
                    </div>
                <?php } ?>
            </div>
    </div>
</div>