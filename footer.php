<?php

$open_hours_group = get_field('open-hours-group', 'option');
$open_hours_repeater = $open_hours_group['open-hours'];

$name = get_field('name', 'option');

$contact_address_group = get_field('contact-address', 'option');
$address = $contact_address_group['address'];
$contacts = $contact_address_group['contact'];
$email = $contacts['e-mail'];
$tel = $contacts['tel'];
$fax = $contacts['fax'];

$graphics_group = get_field('graphics', 'option');
$footer_logo = $graphics_group['footer-logo'];
$footer_map = $graphics_group['footer-map'];

$channels_repeater = get_field('channels', 'option');

?>


<footer class="bg-blue color-white">
    
    <div class="section__container">
        <div class="row pb-lg-7 pb-md-6 pb-xl-8 pb-xxxl-8 pt-5 pt-lg-7 pt-md-6 pt-xl-8 pt-xxxl-9">
    
            <div class="col-12 col-sm-3 col-md-2 order-1 order-sm-2 order-md-1 ps-xl-4 ps-xxl-5 mb-5">
                <?php if( isset($footer_logo) && !empty($footer_logo) ){ ?>
                    <div id="footer__logo-container">
                        <img src="<?php echo $footer_logo['url']; ?>">
                    </div>
                <?php } ?>
            </div>




            <!-- FRONTPAGE FOOTER -->

            <?php if(is_front_page()){ ?>
                <div id="footer-front-page" class="col-12 col-sm-9 col-md-10 order-2 order-sm-1 order-md-2 px-md-0">
                    <div class="row">
                        <div class="col-12 col-xl-6 col-xxl-7 d-none d-xl-block border-xl-right pe-xl-5 ps-xl-5 ps-xxl-6 pe-xxl-6 ps-xxxl-8 pe-xxxl-8">
                            <?php if( isset($footer_map) && !empty($footer_map) ){ ?>
                                <img src="<?php echo $footer_map['url']; ?>">
                            <?php } ?>
                        </div>

                        <div class="col-12 col-xl-6 col-xxl-5 d-flex flex-column flex-md-row flex-xl-column ps-xl-0">                            
                            <div class="info-section mb-5 mb-md-0 mb-xl-6 col-12 col-md-6 col-xl-12 d-flex flex-column flex-lg-row pe-md-4 ps-md-5 px-xl-0">
                                <div class="info-section__label mb-4 mb-md-0">
                                    <p>Praxis</p>
                                </div>
                                <div class="info-section__info">
                                    <?php if( isset($name) && !empty($name) ){ ?>
                                        <div class="mb-4">
                                            <?php echo $name; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( isset($address) && !empty($address) ){ ?>
                                        <div>
                                            <?php echo $address; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( isset($tel) && !empty($tel) ){ ?>
                                        <div>
                                            <a href="<?php tel_validity( $tel ); ?>"><span>T <span><?php echo $tel; ?></a>
                                        </div>
                                    <?php } ?>
                                    <?php if( isset($fax) && !empty($fax) ){ ?>
                                        <div>
                                            <span>F </span><?php echo $fax; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( isset($email) && !empty($email) ){ ?>
                                        <div>
                                            <a href="<?php email_validity( $email ); ?>"><?php echo $email; ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php if( isset( $open_hours_repeater ) && !empty( $open_hours_repeater ) ){ ?>
                                
                                <div class="info-section mb-5 mb-md-0 col-12 col-md-6 col-xl-12 d-flex flex-column flex-lg-row pe-md-2 ps-md-4 px-xl-0">
                                    <div class="info-section__label mb-4 mb-md-0">
                                        <p>Geöffnet</p>
                                    </div>
                                    <div class="info-section__info ">

                                        <div class="open-hours mb-5 mb-xl-6 mb-xxl-7 mb-xxxl-9">
                                            <?php foreach( $open_hours_repeater as $days_hours ){ ?>
                                                <?php if( isset( $days_hours['days-hours'] ) && !empty( $days_hours['days-hours'] ) ){
                                                    $day_entry = $days_hours['days-hours'];
                                                    if( isset( $day_entry['day'] ) && !empty( $day_entry['day'] ) && isset( $day_entry['hours-1'] ) && !empty( $day_entry['hours-1'] ) ){ ?>
                                                        <div class="open-hours__entry">
                                                            <div class="open-hours__entry__day"><?php echo $day_entry['day'] ?></div>
                                                            <div class="open-hours__entry__hours-1"><?php echo $day_entry['hours-1'] ?>
                                                                <?php if( isset( $day_entry['hours-2'] ) && !empty( $day_entry['hours-2'] ) ){?>
                                                                    <div class="open-hours__entry__hours-2"><span>& </span><?php echo $day_entry['hours-2']; ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } ?>
                                            <?php } ?>
                                        </div>

                                        <div class="">
                                            <?php if( isset( $channels_repeater ) && !empty( $channels_repeater ) ){ ?>
                                                <div class="sm-channels mb-4">
                                                    <?php foreach( $channels_repeater as $channel ){ ?>
                                                        <a class="sm-channels__channel" href="<?php echo $channel['url']; ?>">
                                                            <img src="<?php echo $channel['logo']['url']; ?>">
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>

                                            <?php wp_nav_menu( array(
                                                'theme_location' => 'footer_menu',
                                                'container'     => 'nav',
                                                'container_id'  => 'footer__menu'
                                            )); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                         
                        </div>
                    </div>
                </div>        
            <?php } else { ?>
            
            <!-- // FRONTPAGE FOOTER -->




            <!-- OTHER PAGE FOOTER -->

            <div id="footer-page" class="col-12 col-sm-9 col-md-10 order-2 order-sm-1 order-md-2">
                <div class="row justify-content-md-center">

                    <div class="col-12 col-md-auto info-section border-md-right mb-5 mb-md-0 d-flex flex-column flex-lg-row pe-md-5 pe-lg-7 pe-xxxl-9">
                        <div class="info-section__label mb-4">
                            <p>Praxis</p>
                        </div>
                        <div class="info-section__info">
                            <?php if( isset($name) && !empty($name) ){ ?>
                                <div class="mb-4">
                                    <?php echo $name; ?>
                                </div>
                            <?php } ?>
                            <?php if( isset($address) && !empty($address) ){ ?>
                                <div>
                                    <?php echo $address; ?>
                                </div>
                            <?php } ?>
                            <?php if( isset($tel) && !empty($tel) ){ ?>
                                <div>
                                    <a href="<?php tel_validity( $tel ); ?>"><span>T <span><?php echo $tel; ?></a>
                                </div>
                            <?php } ?>
                            <?php if( isset($fax) && !empty($fax) ){ ?>
                                <div>
                                    <span>F </span><?php echo $fax; ?>
                                </div>
                            <?php } ?>
                            <?php if( isset($email) && !empty($email) ){ ?>
                                <div>
                                    <a href="<?php email_validity( $email ); ?>"><?php echo $email; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    
                    <?php if( isset( $open_hours_repeater ) && !empty( $open_hours_repeater ) ){ ?>
                        
                        <div class="col-12 col-md-auto info-section mb-5 mb-md-0 d-flex flex-column flex-lg-row ps-md-5 ps-lg-10 ps-xxxl-13">
                            <div class="info-section__label mb-4">
                                <p>Geöffnet</p>
                            </div>
                            <div class="info-section__info">
                                <div class="open-hours mb-5 mb-xl-6 mb-xxl-7 mb-xxxl-9">
                                    <?php foreach( $open_hours_repeater as $days_hours ){ ?>
                                        <?php if( isset( $days_hours['days-hours'] ) && !empty( $days_hours['days-hours'] ) ){
                                            $day_entry = $days_hours['days-hours'];
                                            if( isset( $day_entry['day'] ) && !empty( $day_entry['day'] ) && isset( $day_entry['hours-1'] ) && !empty( $day_entry['hours-1'] ) ){ ?>
                                                <div class="open-hours__entry">
                                                    <div class="open-hours__entry__day"><?php echo $day_entry['day'] ?></div>
                                                    <div class="open-hours__entry__hours-1">
                                                        <?php echo $day_entry['hours-1'] ?>
                                                        <?php if( isset( $day_entry['hours-2'] ) && !empty( $day_entry['hours-2'] ) ){?>
                                                            <div class="open-hours__entry__hours-2">
                                                                <span>& </span>
                                                                <?php echo $day_entry['hours-2']; ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>                                                    
                                                </div>
                                            <?php }
                                        } ?>
                                    <?php } ?>
                                </div>

                                <?php if( isset( $channels_repeater ) && !empty( $channels_repeater ) ){ ?>
                                    <div class="sm-channels mb-4">
                                        <?php foreach( $channels_repeater as $channel ){ ?>
                                            <a class="sm-channels__channel" href="<?php echo $channel['url']; ?>">
                                                <img src="<?php echo $channel['logo']['url']; ?>">
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php wp_nav_menu( array(
                                    'theme_location' => 'footer_menu',
                                    'container'     => 'nav',
                                    'container_id'  => 'footer__menu'
                                )); ?>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>

            <!-- // OTHER PAGE FOOTER -->

            <?php } ?>

        </div>
    </div>    
</footer>

<?php wp_footer(); ?>
</body>
</html>