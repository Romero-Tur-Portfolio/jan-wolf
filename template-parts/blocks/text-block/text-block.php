<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === TEXT-BLOCK === ></div>

<?php
$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];
$id = $options['id'];

$text = get_field('text');
$heading = get_field('heading');
?>

<div class="section text-block <?php echo $bg_color; ?>">
    <div class="section__container">
        <?php if( !empty( $id ) ){ ?>
            <div class="anchor-bar" id="<?php echo $id; ?>"></div>
        <?php } ?>
        <div class="row <?php echo $classes; ?>">            
            <div class="col-12 col-md-10 col-xl-9 col-xxl-8 offset-md-1 offset-xxl-2 pe-lg-5 pe-xxxl-6 ps-lg-5 ps-xxxl-9">

                <?php if( !empty( $heading ) ){ ?>
                    <h1 class="heading-lg mb-4 mb-xxxl-5"><?php echo $heading; ?></h1>
                <?php } ?>
                <?php if( !empty( $text ) ){
                    echo $text;
                } ?>
                
            </div>
        </div>
    </div>
</div>

