<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === KOPF-SLIDER === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$imgs_repeater = get_field('imgs');

$heading_content = get_field('heading');
$tag = $heading_content['tag'];
$heading = $heading_content['text'];

$avis = get_field('avis', 'option');
?>

<div class="section head-slider <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?>">
            <div class="col-12 col-md-6 ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-6 pe-xxl-8 pe-xxxl-11 mb-5 mb-md-0">

                <?php if( !empty($heading) && isset( $tag ) ){ ?>
                    <<?php echo $tag; ?> class="mb-4 mb-md-5 heading-lg"><?php echo $heading; ?></<?php echo $tag; ?>>
                <?php } ?>

                <?php if( !empty($avis) ){ ?>
                    <div class="avis bg-blue p-3 p-md-4 pe-4 pe-md-5">
                        <div class="avis__text"><?php echo $avis; ?></div>
                        <button class="avis__btn"></button>
                    </div>
                <?php } ?>
            </div>
            <div class="col-12 col-md-6 pe-md-0">
                <?php if( $imgs_repeater && isset( $imgs_repeater ) ){ ?>
                    <div id="head-slider" class="d-flex flex-column">
                        <?php foreach( $imgs_repeater as $img ){ ?>
                            <?php echo wp_get_attachment_image($img['img'], 'full'); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>

jQuery(document).ready(function($){
    var slider = $('#head-slider');
    slider.slick({
        arrows: false,
        dots: true,
        dotsClass: "dot",
        mobileFirst: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        infinite: true,
        autoplay: true,
        initialSlide: 0,
    });
    var dots = $(slider).find('.dot');
    var slickList = $(slider).find('.slick-list');
    dots.addClass('order-1');
    slickList.addClass('order-2');
});

</script>