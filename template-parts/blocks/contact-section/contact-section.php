<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === CONTACT SECTION === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$form_inhalt = get_field('form');

$shortcode = $form_inhalt['shortcode'];

$text_content = $form_inhalt['text-content'];
$text = $text_content['text'];
$heading_group = $text_content['heading_group'];
$tag = $heading_group['tag'];
$heading = $heading_group['heading'];
?>

<div class="section contact-section <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12 <?php echo $classes; ?>">
            <div class="col-12 col-md-6 pe-xl-5 pe-xxl-6 pe-xxxl-8 ps-lg-0">
                <?php if( !empty( $heading ) && isset( $tag ) ){ ?>
                    <<?php echo $tag; ?> class="heading-lg mb-4 mb-lg-5 mb-xxl-6"><?php echo $heading; ?></<?php echo $tag; ?>>
                <?php } ?>                
            </div>
            <div class="col-12 col-md-6 pe-xl-5 pe-xxl-6 pe-xxxl-8 ps-lg-0">
                <?php if( !empty( $text ) ){ 
                    echo $text;
                 } ?>
            </div>
            <?php if( !empty( $shortcode ) ) { ?>
                <div class="col-12">
                    <?php echo do_shortcode( $shortcode ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>