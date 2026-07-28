<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === ÜBERSCHRIFT-SEITLICH UND TEXT === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$content = get_field('content');

$heading_group = $content['heading-group'];
$heading = $heading_group['heading'];
$tag = $heading_group['tag'];
$text = $content['text'];

?>

<div class="section heading-aside-text <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?>">
            <?php if( isset( $tag ) && !empty( $heading ) ){ ?>
                <div class="col-12 col-md-6 ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-6 pe-xxl-8 pe-xxxl-11">                    
                    <<?php echo $tag; ?> class="heading-lg mb-4"><?php echo $heading; ?></<?php echo $tag; ?>>
                </div>
                <div class="col-12 col-md-6 pe-lg-4 pe-xl-6 pe-xxl-10 pe-xxxl-14">
                    <?php if( !empty( $text ) ){
                        echo $text;
                    } ?>            
                </div>
            <?php } else { ?>
                <div class="text-content two-cols col-12 ps-lg-4 ps-xl-7 ps-xxl-9 ps-xxxl-12 pe-lg-4 pe-xl-7 pe-xxl-9 pe-xxxl-12">
                    <?php if( !empty( $text ) ){
                        echo $text;
                    } ?>            
                </div>
            <?php } ?>
        </div>
    </div>
</div>

