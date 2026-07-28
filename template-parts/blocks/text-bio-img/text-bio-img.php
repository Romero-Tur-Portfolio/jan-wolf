<div class="d-none" style="border: 1px solid black;">Text + Bio + Bild</div>

<?php

$name_dir = get_field('name_dir');
$name = $name_dir['name'];
$order_str = $name_dir['order'];

$content_group = get_field('content-group');
$text = $content_group['text'];
$img = $content_group['img'];

$list_repeater = get_field('list');

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];
$id = $options['id'];

$order_array = explode("-", $order_str);
$img_index = array_search("img", $order_array);
$text_index = array_search("text", $order_array);

?>

<div class="section text-bio-img text-bio-img--<?php echo $order_str; ?> <?php echo $bg_color; ?>" data-bg-color="<?php echo $bg_color; ?>" id="<?php echo $id; ?>">
    
    <?php if(!empty($id)){ ?>
        <div id="<?php echo $id; ?>" class="anchor-bar"></div>
    <?php } ?>

    <div class="section__container">
        <div class="row <?php echo $classes; ?>">
            
            <div class="col-12 col-md-6 mb-5 mb-md-0 order-0 order-md-<?php echo $text_index; ?>">
                <?php if( !empty( $name ) ){ ?>
                    <h2 class="heading-md mb-3">
                        <?php echo $name; ?>
                    </h2>
                <?php } ?>
                <?php if( !empty( $text ) ){ ?>
                    <div class="text-content">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>

                <?php if( !empty( $list_repeater ) ){ ?>
                    <div class="list-content mt-5">
                        <h3 class="heading-md">Vita</h2>
                        <?php foreach( $list_repeater as $entry) { ?>
                                
                            <?php if( !empty( $entry ) ){ ?>
                                <div class="list-content__entry py-3">

                                    <?php if( !empty( $entry['time']) ){ ?>
                                        <div class="list-content__entry__time">
                                            <?php echo $entry['time']; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if( !empty( $entry['dids']) ){ ?>
                                        <div class="list-content__entry__dids">
                                            <?php echo $entry['dids']; ?>
                                        </div>                                            
                                    <?php } ?>

                                </div>
                            <?php } ?>

                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if( !empty( $xtra_text ) ){ ?>
                    <div class="text-content mt-5">
                        <?php echo $xtra_text; ?>
                    </div>
                <?php } ?>
            
            </div>

            <div class="col-12 col-md-6 order-1 order-md-<?php echo $img_index; ?>">
                <?php if( !empty( $img )){ ?>
                    <div class="img-content">
                        <?php echo wp_get_attachment_image($content_group['img'], 'full'); ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

