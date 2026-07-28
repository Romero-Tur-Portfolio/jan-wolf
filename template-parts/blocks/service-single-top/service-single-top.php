<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === SERVICE-SINGLE-TOP === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$imgs = get_field('imgs');
$img = $imgs['img'];
$pictogramm = $imgs['pictogramm'];

?>

<div class="section service-single-top <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?> align-items-end">
            <?php if( isset($pictogramm) && !empty($pictogramm) ){ ?>
                <div class="pictogramm d-none d-md-flex col-12 col-md-4 mbn-lg-7 mbn-md-5 mbn-xl-9 mbn-xxxl-12 pe-md-0 ps-lg-5 ps-xl-7 ps-xxl-11">
                    <?php echo wp_get_attachment_image($pictogramm, 'full'); ?>
                </div>
            <?php } ?>

            <?php if( isset($img) && !empty($img) ){ ?>
                <div class="col-12 col-md-8 ps-md-0 pe-md-0 pe-lg-5 pe-xl-7 pe-xxl-9 pe-xxxl-11">
                    <?php echo wp_get_attachment_image($img, 'full'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>