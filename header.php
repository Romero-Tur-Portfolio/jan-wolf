<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset') ?>"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="top"></div>

<?php

require_once 'custom-functions.php';

$graphics_group = get_field('graphics', 'option');
$header_logo = $graphics_group['header-logo'];

$contact_and_address_group = get_field('contact-address', 'option');
$contact_group = $contact_and_address_group['contact'];
$email = $contact_group['e-mail'];
$tel = $contact_group['tel'];
$fax = $contact_group['fax'];

$links_group = get_field('links', 'option');
$instant_app = $links_group['instant-app'];

$open_hours_group = get_field('open-hours-group', 'option');
$open_hours_repeater = $open_hours_group['open-hours'];

?>


<header class="bg-white bg-md-transparent">
    <div class="section__container overflow-visible">
		<div class="row align-items-center align-items-md-start d-flex" id="headerTopWrap">

			<div class="col-3 col-sm-2" id="header__logo">
				<?php if( isset($header_logo) && !empty( $header_logo ) ){ ?>
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $header_logo['url']; ?>" >
					</a>
				<?php } else { ?>
                    <a href="<?php echo home_url(); ?>">
						<img src="<?php bloginfo('template_url'); ?>/img/header-logo.svg" >
					</a>
                <?php }	?>
			</div>

            <div class="col-9 col-sm-10 pe-0">
                <div class="d-flex justify-content-end">
                    <div id="header__utils" class="bg-md-white">

                        <div class="d-none d-md-flex">
                            <?php if( isset( $tel ) && !empty( $tel ) || isset( $email ) && !empty( $email ) || isset( $fax ) && !empty( $fax ) ){ ?>
                                <button class="quick-call-btn" data-quick-call="quick-contact">Komfortkontakt</button>
                            <?php } ?>
                            <?php if( isset( $instant_app ) && !empty( $instant_app ) ){ ?>
                                <a class="quick-call-btn" target="blank" href="<?php echo $instant_app; ?>">Online-Termine</a>
                            <?php } ?>
                        </div>

                        <button id="header__menu-btn" class="closed" data-opener-sender="header__menu">
                            <span>Menü</span>
                            <div class="hamburger">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
		</div>

        <div id="header__menu" class="closed bg-blue color-white" data-opener-receiver="header__menu">
            <div class="d-flex d-md-none justify-content-end flex-wrap">
                <?php if( isset( $tel ) && !empty( $tel ) || isset( $email ) && !empty( $email ) || isset( $fax ) && !empty( $fax ) ){ ?>
                    <button class="quick-call-btn" data-quick-call="quick-contact-mob">Komfortkontakt</button>
                <?php } ?>
                <?php if( isset( $instant_app ) && !empty( $instant_app ) ){ ?>
                    <a class="quick-call-btn" target="blank" href="<?php echo $instant_app; ?>">Online-Termine</a>
                <?php } ?>
            </div>

            <?php if( isset( $tel ) && !empty( $tel ) || isset( $email ) && !empty( $email ) || isset( $fax ) && !empty( $fax ) ){ ?>
                <div class="quick-call-pane position-fixed d-block d-md-none text-uppercase p-4 pe-6 bg-white color-blue" data-quick-target="quick-contact-mob">
                    <button class="quick-call-pane__btn"></button>
                    <?php if ( isset($tel) && !empty($tel) || isset($mail) && !empty($mail) ){ ?>
                        <div class="contacts mb-4">
                            <?php if( isset($tel) && !empty($tel) ){ ?>
                                <div>
                                    <a href="<?php tel_validity( $tel ); ?>">T <?php echo $tel ?></a>
                                </div>
                            <?php } ?>
                            
                            <?php if( isset($email) && !empty($email) ){ ?>
                                <div>
                                    <a href="<?php email_validity( $email ); ?>"><?php echo $email ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if( isset( $open_hours_repeater ) && !empty( $open_hours_repeater ) ){ ?>
                        <div class="open-hours">
                            <?php foreach( $open_hours_repeater as $days_hours ){ ?>
                                <?php if( isset( $days_hours['days-hours'] ) && !empty( $days_hours['days-hours'] ) ){
                                    $day_entry = $days_hours['days-hours'];
                                    if( isset( $day_entry['day'] ) && !empty( $day_entry['day'] ) && isset( $day_entry['hours-1'] ) && !empty( $day_entry['hours-1'] ) ){ ?>
                                        <div class="open-hours__entry">
                                            <div class="open-hours__entry__day"><?php echo $day_entry['day'] ?></div>
                                            <div class="open-hours__entry__hours-1"><?php echo $day_entry['hours-1'] ?>
                                                <?php if( isset( $day_entry['hours-2'] ) && !empty( $day_entry['hours-2'] ) ){?>
                                                    <div class="open-hours__entry__hours-2">& <?php echo $day_entry['hours-2']; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <?php wp_nav_menu( array(
                'theme_location' => 'header_menu',
                'container'     => 'nav',
                'link_before'   => '<span>',
                'link_after'    => '</span>'
            )); ?>
            <div id="header__menu__footer-menu" class="mt-5 mb-5">
                <?php wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container'     => 'nav',
                    'link_before'   => '<span>',
                    'link_after'    => '</span>'
                )); ?>
            </div>

            

        </div>
    </div>

    <?php if( isset( $tel ) && !empty( $tel ) || isset( $email ) && !empty( $email ) || isset( $fax ) && !empty( $fax ) ){ ?>
        <div class="quick-call-pane d-none d-md-block text-uppercase p-4 pe-6 bg-blue color-white" data-quick-target="quick-contact">
            <button class="quick-call-pane__btn"></button>
            <?php if ( isset($tel) && !empty($tel) || isset($mail) && !empty($mail) ){ ?>
                <div class="contacts mb-4">
                    <?php if( isset($tel) && !empty($tel) ){ ?>
                        <div>
                            <a href="<?php tel_validity( $tel ); ?>">T <?php echo $tel ?></a>
                        </div>
                    <?php } ?>
                    
                    <?php if( isset($email) && !empty($email) ){ ?>
                        <div>
                            <a href="<?php email_validity( $email ); ?>"><?php echo $email ?></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if( isset( $open_hours_repeater ) && !empty( $open_hours_repeater ) ){ ?>
                <div class="open-hours">
                    <?php foreach( $open_hours_repeater as $days_hours ){ ?>
                        <?php if( isset( $days_hours['days-hours'] ) && !empty( $days_hours['days-hours'] ) ){
                            $day_entry = $days_hours['days-hours'];
                            if( isset( $day_entry['day'] ) && !empty( $day_entry['day'] ) && isset( $day_entry['hours-1'] ) && !empty( $day_entry['hours-1'] ) ){ ?>
                                <div class="open-hours__entry">
                                    <div class="open-hours__entry__day"><?php echo $day_entry['day'] ?></div>
                                    <div class="open-hours__entry__hours-1"><?php echo $day_entry['hours-1'] ?>
                                        <?php if( isset( $day_entry['hours-2'] ) && !empty( $day_entry['hours-2'] ) ){?>
                                            <div class="open-hours__entry__hours-2">& <?php echo $day_entry['hours-2']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</header>