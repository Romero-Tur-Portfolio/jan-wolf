<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === BODY-SLIDER === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$imgs_repeater = get_field('imgs');

$heading_content = get_field('heading');
$tag = $heading_content['tag'];
$heading = $heading_content['text'];

?>

<div class="section body-slider <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12 <?php echo $classes; ?>">
            <div class="col-12 col-md-6 bg-md-blue p-lg-4 p-md-3 p-xxl-5">

                <?php if( !empty($heading) && isset( $tag ) ){ ?>
                    <<?php echo $tag; ?> class="heading-lg"><?php echo $heading; ?></<?php echo $tag; ?>>
                <?php } ?>
                
            </div>
            <div class="col-12 col-md-6 px-md-0">
                <?php if( $imgs_repeater && isset( $imgs_repeater ) ){ ?>
                    <div id="body-slider" class="d-flex flex-column">
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
    var slider = $('#body-slider');
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