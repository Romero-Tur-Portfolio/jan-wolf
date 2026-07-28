<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === LEISTUNGSKACHELN (3 IN REIHE) === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$img = get_field('img');
$services_repeater = get_field('services');

?>

<div class="section services-overview <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?>">

            <div class="col-12 ps-lg-5 pe-lg-5 ps-xl-7 pe-xl-7 ps-xxl-9 pe-xxl-9 ps-xxxl-11 pe-xxxl-11">

                <div class="d-flex flex-column flex-md-row flex-wrap men-lg-4 msn-md-3 msn-lg-4 msn-xxl-5">
 
                    <?php if( isset($services_repeater) && !empty($services_repeater) ){ ?>

                        <?php if( !empty($img) ){
                            for ($i = 0; $i < 3; $i++) { ?>
                                <div class="service-tile d-flex flex-column col-12 col-md-4 mb-4 mb-md-5 mb-xl-6 mb-xxl-7 ps-md-3 pe-md-0 ps-lg-4 ps-xxl-5">
                                    <div class="align-items-center align-items-md-start d-flex flex-md-column me-md-3 me-lg-4 me-xxl-5 pe-3 pe-md-4 pe-lg-5 pe-xxxl-7">
                                        <div class="service-tile__number heading-xl mb-md-2 mb-lg-3 mb-xl-4 mb-xxxl-5">
                                            <?php echo $services_repeater[$i]['number'] ?>
                                        </div>
                                        <div class="service-tile__name heading-sm mb-lg-1 mb-xl-3 mb-xxxl-5">
                                            <?php echo $services_repeater[$i]['name'] ?>
                                        </div>
                                    </div>
                                    <div class="service-tile__link  me-md-3 me-lg-4 me-xxl-5">
                                        <a class="btn" href="<?php echo $services_repeater[$i]['link'] ?>">Weiterlesen</a>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="service-tile-img col-md-8 d-none d-md-block mb-5 mb-xl-6 mb-xxl-7 px-md-3 px-lg-4 px-xxl-5">
                                <?php echo wp_get_attachment_image($img, 'full'); ?>
                            </div>

                            <?php for($i = 3; $i < count($services_repeater); $i++){ ?>
                                <div class="service-tile d-flex flex-column col-12 col-md-4 mb-4 mb-md-5 mb-xl-6 mb-xxl-7 ps-md-3 pe-md-0 ps-lg-4 ps-xxl-5">
                                    <div class="align-items-center align-items-md-start d-flex flex-md-column me-md-3 me-lg-4 me-xxl-5 pe-3 pe-md-4 pe-lg-5 pe-xxxl-7">
                                        <div class="service-tile__number heading-xl mb-md-2 mb-lg-3 mb-xl-4 mb-xxxl-5">
                                            <?php echo $services_repeater[$i]['number'] ?>
                                        </div>
                                        <div class="service-tile__name heading-sm mb-lg-1 mb-xl-3 mb-xxxl-5">
                                            <?php echo $services_repeater[$i]['name'] ?>
                                        </div>
                                    </div>
                                    <div class="service-tile__link  me-md-3 me-lg-4 me-xxl-5">
                                        <a class="btn" href="<?php echo $services_repeater[$i]['link'] ?>">Weiterlesen</a>
                                    </div>
                                </div>
                            <?php } ?>

                        <?php }
                        else {
                            foreach( $services_repeater as $service ){ ?>
                                
                                <div class="service-tile d-flex flex-column col-12 col-md-4 mb-4 mb-md-5 mb-xl-6 mb-xxl-7 ps-md-3 pe-md-0 ps-lg-4 ps-xxl-5">
                                    <div class="align-items-center align-items-md-start d-flex flex-md-column  me-md-3 me-lg-4 me-xxl-5 pe-3 pe-md-4 pe-lg-5 pe-xxxl-7">
                                        <div class="service-tile__number heading-xl mb-md-2 mb-lg-3 mb-xl-4 mb-xxxl-5">
                                            <?php echo $service['number']; ?>
                                        </div>
                                        <div class="service-tile__name heading-sm mb-lg-1 mb-xl-3 mb-xxxl-5">
                                            <?php echo $service['name']; ?>
                                        </div>
                                    </div>
                                    <div class="service-tile__link  me-md-3 me-lg-4 me-xxl-5">
                                        <a class="btn" href="<?php echo $service['link']; ?>">Weiterlesen</a>
                                    </div>
                                </div>

                            <?php }
                        } ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

