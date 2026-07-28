<div class="d-none" style="padding: 10px; border: 1px solid; color: gray;">< === TEXT-KONTAKT === ></div>

<?php

$options = get_field('options');
$bg_color = $options['bg-color'];
$classes = $options['classes'];

$open_hours_group = get_field('open-hours-group', 'option');
$open_hours_repeater = $open_hours_group['open-hours'];

$name = get_field('name', 'option');

$contact_address_group = get_field('contact-address', 'option');
$address = $contact_address_group['address'];

$contacts = $contact_address_group['contact'];
$email = $contacts['e-mail'];
$tel = $contacts['tel'];
$fax = $contacts['fax'];

$form_text_group = get_field('text-content');
$heading = $form_text_group['heading'];
$text = $form_text_group['text'];
$code = get_field('code');


function email_check( $arg ){
    $output = 'mailto:' . preg_replace('/[^a-zA-Z0-9@._-]/', '', $arg);
    return $output;
}

function tel_check( $arg ){
    $output = 'tel:' . preg_replace('/[^0-9+]/', '', $arg);
    return $output;
}

?>

<div class="section text-contact <?php echo $bg_color; ?>">
    <div class="section__container">
        <div class="row <?php echo $classes; ?>">
        
            <div class="col-12 col-md-10 col-xl-9 col-xxl-8 offset-md-1 offset-xxl-2 pe-lg-5 pe-xxxl-6 ps-lg-5 ps-xxxl-9">
                <div class="row">
                    <div class="col-12 col-md-6">
                        
                        <p class="heading-md mb-4">Praxis</p>
                        
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
                                <a href="<?php echo tel_check( $tel ); ?>">
                                    <span>T </span><?php echo $tel; ?>
                                </a>
                            </div>
                        <?php } ?>

                        <?php if( isset($fax) && !empty($fax) ){ ?>
                            <div>
                                <span>F </span><?php echo $fax; ?>
                            </div>
                        <?php } ?>
                        
                        <?php if( isset($email) && !empty($email) ){ ?>
                            <div>
                                <a href="<?php echo email_check( $email ); ?>">
                                    <?php echo $email; ?>
                                </a>
                            </div>
                        <?php } ?>

                        <?php if( isset( $open_hours_repeater ) && !empty( $open_hours_repeater ) ){ ?>
                            
                            <p class="heading-md mb-4 mt-5">Geöffnet</p>
                            <div class="open-hours mb-5 mb-xl-6 mb-xxl-7 mb-xxxl-9">
                                <?php foreach( $open_hours_repeater as $days_hours ){ ?>
                                    <?php if( isset( $days_hours['days-hours'] ) && !empty( $days_hours['days-hours'] ) ){
                                        $day_entry = $days_hours['days-hours'];
                                        if( isset( $day_entry['day'] ) && !empty( $day_entry['day'] ) && isset( $day_entry['hours-1'] ) && !empty( $day_entry['hours-1'] ) ){ ?>
                                            <div class="open-hours__entry">
                                                <div class="open-hours__entry__day"><?php echo $day_entry['day']; ?></div>
                                                <div class="open-hours__entry__hours-1"><?php echo $day_entry['hours-1']; ?>
                                                    <?php if( isset( $day_entry['hours-2'] ) && !empty( $day_entry['hours-2'] ) ){ ?>
                                                        <div class="open-hours__entry__hours-2"><span>& </span><?php echo $day_entry['hours-2']; ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                        <?php } ?>
                    </div>

                    <div class="col-12 col-md-6">
                        <?php if( isset($heading) && !empty($heading) ){ ?>
                            <p class="heading-md mb-4"><?php echo $heading; ?></p>
                        <?php } ?>
                        <?php if( isset($text) && !empty($text) ){ ?>
                            <?php echo $text; ?>
                        <?php } ?>
                        <?php if( isset($code) && !empty($code) ){ ?>
                            <div class="mt-5"><?php echo $code; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

