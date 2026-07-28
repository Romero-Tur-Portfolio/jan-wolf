<?php
$content_group = get_field('content-group');
$options = get_field('options');

/*$layout_str = $options['layout'];
preg_match_all("/\d+/", $layout_str, $layout_matches);
$layout_cols = $layout_matches[0];*/

$order_str = $options['order'];
$order_array = explode("-", $order_str);

$img_index = array_search("img", $order_array);
$text_index = array_search("text", $order_array);
?>

<div class="section text-img text-img--<?php echo $order_str; ?>">
    <div class="section__container container">
        <div class="row">
            
            <div class="col-12 col-md-6 order-0 order-md-<?php echo $text_index; ?>">
                <?php if( $content_group['text'] && !empty( $content_group['text'] ) ){ ?>
                    <div class="text-content">
                        <?php echo $content_group['text']; ?>
                    </div>
                <?php } ?>
            </div>

            <div class="col-12 col-md-6 order-1 order-md-<?php echo $img_index; ?>">
                <?php if( $content_group['img'] && !empty( $content_group['img'] ) ){ ?>
                    <div class="img-content">
                        <?php echo wp_get_attachment_image($content_group['img'], 'full'); ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

