<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === SONDERKREATIVELEMENT === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$content = get_field('content');

$img_group = $content['img-content'];
$img_classes = $img_group['classes'];
$img = $img_group['img'];
$alt_img = $img_group['alt-img'];

$text_group = $content['text-content'];
$text_classes = $text_group['classes'];
$heading = $text_group['heading'];
$intro_text = $text_group['intro-text'];
$main_text = $text_group['main-text'];
$link = $text_group['link'];

?>

<div class="section creative-block <?php echo $bg_color; ?>">
    <div class="section__container overflow-visible">
        <div class="row <?php echo $classes; ?>">

            <?php if( !empty($heading) ){ ?>
                <h2 class="heading-md text-center col-12 mb-5 mb-lg-6 mb-xl-7 mb-xxl-8 ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12">
                    <span class="d-inline-block ps-lg-6 pe-lg-6 ps-xl-8 pe-xl-8"><?php echo $heading; ?></span>
                </h2>
            <?php } ?>

            <div class="col-12 col-md-6 order-1 order-md-2 ps-xl-7 ps-xxl-9 ps-xxxl-11 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12 <?php echo $text_classes; ?>">
                <?php if( !empty($intro_text) ){
                    echo $intro_text;
                } ?>

                <?php if( !empty($link) ){ ?>
                    <a class="btn mt-3 mt-xl-4 mt-xxl-5 mt-xxxl-6" href="<?php echo $link; ?>">Weiterlesen</a>
                <?php } ?>

                <?php if( !empty($main_text) ){
                    echo $main_text;
                } ?>
            </div>
            
            <div class="col-12 col-md-6 order-2 order-md-1 ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-xl-0">
                <?php if( !empty( $alt_img ) ){ ?>
                    <div class="alt-img d-none d-xl-block">
                        <?php echo wp_get_attachment_image($alt_img, 'full'); ?>
                    </div>
                <?php } ?>

                <?php if( !empty( $img ) ){ ?>
                    <div class="main-img">
                        <?php echo wp_get_attachment_image($img, 'full'); ?>
                    </div>
                <?php } ?>                
            </div>                
        </div>
    </div>
</div>