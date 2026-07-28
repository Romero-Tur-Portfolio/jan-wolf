<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === LEISTUNGSKACHELN === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$heading = get_field('heading');

$services_repeater = get_field('services');

?>

<div class="section services-tiles-block <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?>">

            <?php if( isset( $heading ) || !empty( $heading ) ){ ?>
                <h2 class="ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12 heading-lg text-center mb-5 mb-xl-6">
                    <?php echo $heading; ?>
                </h2>
            <?php } ?>
            
            <?php if( isset( $services_repeater ) || !empty( $services_repeater ) ){ ?>

                <?php foreach( $services_repeater as $service ){

                    $text_content = $service['text-content'];
                    $number = $text_content['number'];
                    $text = $text_content['text'];
                    $link = $text_content['link'];

                    $img_content = $service['img-content'];                
                    $img = $img_content['img'];
                    $alt_img = $img_content['alt-img']; ?>

                    <div class="col-12 col-md-6 ps-lg-4 pe-lg-4 pb-5 service-tile">
                        <div class="d-flex flex-column justify-content-between h-100 pb-xl-5 border-bottom-xl service-tile-wrap">
                            <div>
                                <div class="service-tile__img-content mb-5">
                                    <?php if( isset( $link ) && !empty( $link ) ){ ?>
                                        <a href="<?php echo $link ?>">
                                            <div class="main-img">
                                                <?php if( isset( $img ) && !empty( $img ) ){ ?>
                                                    <?php echo wp_get_attachment_image($img, 'full'); ?>
                                                <?php } ?>
                                            </div>
                                            <div class="alt-img">
                                                <?php if( isset( $alt_img ) && !empty( $alt_img ) ){ ?>
                                                    <?php echo wp_get_attachment_image($alt_img, 'full'); ?>
                                                <?php } ?>
                                            </div>
                                        </a>
                                    <?php } else { ?>
                                        <div class="main-img">
                                            <?php if( isset( $img ) && !empty( $img ) ){ ?>
                                                <?php echo wp_get_attachment_image($img, 'full'); ?>
                                            <?php } ?>
                                        </div>
                                        <div class="alt-img">
                                            <?php if( isset( $alt_img ) && !empty( $alt_img ) ){ ?>
                                                <?php echo wp_get_attachment_image($alt_img, 'full'); ?>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="service-tile__text-content d-flex">
                                    <?php if( !empty( $number ) ){ ?>
                                        <div class="heading-xl service-tile__text-content__number">
                                            <?php echo $number; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( !empty( $text ) ){ ?>
                                        <div class="heading-sm service-tile__text-content__text">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php if( isset( $link ) && !empty( $link ) ){ ?>
                                <a class="mt-4 mt-lg-5 mt-xl-6 btn" href="<?php echo $link; ?>">Weiterlesen</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>

