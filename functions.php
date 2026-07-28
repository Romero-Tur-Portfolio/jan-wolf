<?php 

add_filter( 'show_admin_bar', '__return_false' );

if(function_exists('acf_register_block_type')){
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types(){

    acf_register_block_type( array( 
        'name'              => 'creative-block',
        'title'             => __('Sonderkreativelement'),
        'description'       => __('Sonderkreativelement mit Bild, Überschrift, Teaser-Text, Excerpt-Text, und Link'),
        'render_template'   => '/template-parts/blocks/creative-block/creative-block.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("kreativ", "bild", "teaser-bild", "teaser", "teaser-text", "excerpt", "sonderkreative", "creative", "special")
    ));

    acf_register_block_type( array(
        'name'              => 'text-img',
        'title'             => __('Text/Bild'),
        'description'       => __('Abschnitt mit Text und Bild'),
        'render_template'   => '/template-parts/blocks/text-img/text-img.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("text", "text mit bild", "bild und text", "bild")
    ));

    acf_register_block_type( array(
        'name'              => 'text-bio-img',
        'title'             => __('Text + Vita + Bild'),
        'description'       => __('Abschnitt mit Text, Vita, und Bild'),
        'render_template'   => '/template-parts/blocks/text-bio-img/text-bio-img.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("text", "text mit bild", "bild und text", "bild", "bio", "vita")
    ));

    acf_register_block_type( array(
        'name'              => 'text-block',
        'title'             => __('Text-Block'),
        'description'       => __('Abschnitt mit Text'),
        'render_template'   => '/template-parts/blocks/text-block/text-block.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("text")
    ));

    acf_register_block_type( array(
        'name'              => 'text-contact',
        'title'             => __('Text-Kontakt'),
        'description'       => __('Abschnitt mit Text und Kontaktformular'),
        'render_template'   => '/template-parts/blocks/text-contact/text-contact.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("text", "contact", "kontakt")
    ));

    acf_register_block_type( array(
        'name'              => 'services-tiles-block',
        'title'             => __('Leistungskacheln (2 in Reihe)'),
        'description'       => __('Block mit Leistungs-Kreativelemente in Kacheln-Form'),
        'render_template'   => '/template-parts/blocks/services-tiles-block/services-tiles-block.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("service", "leistung", "kacheln", "tiles", "kreativ", "creative")
    ));

    acf_register_block_type( array(
        'name'              => 'heading-aside-text',
        'title'             => __('Überschrift-seitlich und Text'),
        'description'       => __('Abschnitt mit Überschrift an der Seite und Text'),
        'render_template'   => '/template-parts/blocks/heading-aside-text/heading-aside-text.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("heading", "text", "seitlich", "schriftzug", "überschrift", "aside")
    ));

    acf_register_block_type( array(
        'name'              => 'head-slider',
        'title'             => __('Kopf-Slider'),
        'description'       => __('Slider am Kopf der Seite'),
        'render_template'   => '/template-parts/blocks/head-slider/head-slider.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("slider", "head slider", "top slider")
    ));

    acf_register_block_type( array(
        'name'              => 'body-slider',
        'title'             => __('Body-Slider'),
        'description'       => __('Innen-Slider der Seite'),
        'render_template'   => '/template-parts/blocks/body-slider/body-slider.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("slider", "body slider", "mitte", "innen", "innen-slider")
    ));

    acf_register_block_type( array(
        'name'              => 'contact-section',
        'title'             => __('Kontakt-Abschnitt'),
        'description'       => __('Abschnitt mit Kontakt-Formular'),
        'render_template'   => '/template-parts/blocks/contact-section/contact-section.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("contact", "kontakt", "form", "input", "formular", "mail")
    ));

    acf_register_block_type( array(
        'name'              => 'overview-page-top',
        'title'             => __('Deckblatt-Top'),
        'description'       => __('Top-Teil von Deckblatt-Seite'),
        'render_template'   => '/template-parts/blocks/overview-page-top/overview-page-top.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("top", "kopf", "deckblatt", "overview", "head")
    ));

    acf_register_block_type( array(
        'name'              => 'services-overview',
        'title'             => __('Leistungskacheln (3 in Reihe)'),
        'description'       => __('Kacheln mit Leistungen / Übersicht der Leistungen'),
        'render_template'   => '/template-parts/blocks/services-overview/services-overview.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("tile", "kachel", "leistungen", "services", "overview", "übersicht")
    ));

    acf_register_block_type( array(
        'name'              => 'service-single-top',
        'title'             => __('Service-Single-Top'),
        'description'       => __('Top-Teil von Service-Single-Seite'),
        'render_template'   => '/template-parts/blocks/service-single-top/service-single-top.php',
        'icon'              => 'editor-paste-text',
        'category'          => 'formatting',
        'keywords'          => array("top", "kopf", "leistung", "service", "single", "head")
    ));
}

function scripts_and_styles() {
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/bootstrap.min.css', array(), '1.0' );
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_style( 'slick-slider-style', get_template_directory_uri() . '/slick/slick.css', array(), '1.0' );
    wp_enqueue_script( 'slick-slider-script', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0', true );
    //wp_enqueue_style( 'fonts', get_template_directory_uri() . '/fonts/fonts.css', array(), '1.0' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.min.css', array(), '1.0' );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/jsscripts/scripts.js', "", '1.0', true );
}
add_action('wp_enqueue_scripts', 'scripts_and_styles');


function register_menus(){
    add_theme_support('menus');
    register_nav_menu('header_menu', 'Header Menu');
    register_nav_menu('footer_menu', 'Footer Menu');
}

add_action('after_setup_theme', 'register_menus');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

add_theme_support( 'title-tag' );

?>