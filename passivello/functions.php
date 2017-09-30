<?php

function passivello_enqueue_scripts()
{
    wp_dequeue_style('activello-icons'); // Old FontAwesome
    wp_dequeue_style('activello-style');

    wp_enqueue_style('passivello-style',
        get_stylesheet_directory_uri() . '/style.css', array(),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style('passivello-fontawesome', get_stylesheet_directory_uri() . "/inc/css/font-awesome.min.css");
}

function passivello_enqueue_scripts_hp()
{
    wp_dequeue_style('activello-icons'); // Old FontAwesome
    wp_dequeue_style('activello-style');

    // Static front page
    if (is_front_page() && !is_home()) {
        wp_dequeue_style('activello-bootstrap');

        // wp_enqueue_style( 'activello-style', get_template_directory_uri() );
        // wp_enqueue_script('activello-modernizr', get_template_directory_uri().'/inc/js/modernizr.min.js', array('jquery') );

        wp_enqueue_style('passivello-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic|Montserrat:400,700|Kaushan+Script|Roboto+Slab:400,100,300,700');
        wp_enqueue_style('passivello-bootstrap', get_stylesheet_directory_uri() . "/inc/css/bootstrap.min.css");
        // wp_enqueue_style('passivello-agencycss', get_stylesheet_directory_uri() . "/inc/css/agency.css", array('passivello-bootstrap'));
        wp_enqueue_style('passivello-passivellocss', get_stylesheet_directory_uri() . "/inc/css/passivello.css", array('passivello-bootstrap' /*, 'passivello-agencycss'*/));
        wp_enqueue_script('passivello-recaptcha', "//www.google.com/recaptcha/api.js");
        wp_enqueue_script('passivello-bootstrapjs', get_stylesheet_directory_uri() . "/inc/js/bootstrap.min.js", array('jquery'), false, true);
        wp_enqueue_script('passivello-jqueryeasingjs', get_stylesheet_directory_uri() . "/inc/js/jquery.easing.min.js", array('jquery'), false, true);
        wp_enqueue_script('passivello-jqbsvaljs', get_stylesheet_directory_uri() . "/inc/js/jqBootstrapValidation.js", array('jquery', 'passivello-bootstrapjs'), false, true);
        wp_enqueue_script('passivello-jqueryeasingjs', get_stylesheet_directory_uri() . "/inc/js/jquery.easing.min.js", array('jquery'), false, true);
        wp_enqueue_script('passivello-contactmejs', get_stylesheet_directory_uri() . "/inc/js/contact_me.js", array('jquery'), false, true);
        wp_enqueue_script('passivello-agencyjs', get_stylesheet_directory_uri() . "/inc/js/agency.js", array('jquery'), false, true);
    } else {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', array("activello-bootstrap"));
        wp_enqueue_style('passivello-versatilellocss', get_stylesheet_directory_uri() . "/inc/css/versatilello.css", array('activello-bootstrap', 'parent-style'));
    }
}

add_action('wp_enqueue_scripts', 'passivello_enqueue_scripts');
add_action('wp_enqueue_scripts', 'passivello_enqueue_scripts_hp', 700);


function passivello_load_theme_textdomain()
{
    load_theme_textdomain('passivello', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'passivello_load_theme_textdomain');


function passivello_filter_front_page_template($template)
{
    return is_home() ? '' : $template;
}

add_filter('frontpage_template', 'passivello_filter_front_page_template');

// Date formatting for Facebook events
// http://stackoverflow.com/a/3454358
function passivello_get_hr_event_datetime($datetime)
{

    $date = $datetime->format('d/m/Y');

    if ($date == date('d/m/Y', time() - (24 * 60 * 60))) {
        return __('yesterday') . ', ' . $datetime->format(get_locale() == "en_US" ? 'g:i a' : 'H:i');
    } // past event - don't show day name to avoid confusion
    else if ($datetime->getTimestamp() <= time()) {
        return date_i18n((get_locale() == "en_US" ? 'F j, Y, g:i a' : 'j F Y, H:i'), $datetime->getTimestamp());
    } else if ($date == date('d/m/Y')) {
        $date = __('today');
    } else if ($date == date('d/m/Y', time() + (24 * 60 * 60))) {
        $date = __('tomorrow');
    } // within next week
    else if ($datetime->getTimestamp() > time() && $datetime->getTimestamp() - time() < (24 * 60 * 60 * 6)) {
        $date = date_i18n('l', $datetime->getTimestamp());
    } else if ($datetime->format('Y') == date('Y')) {
        $date = date_i18n('l j F', $datetime->getTimestamp());
    } else {
        $date = date_i18n('l j F Y', $datetime->getTimestamp());
    }
    return $date . ' '. __('at') . ' ' . $datetime->format(get_locale() == "en_US" ? 'g:i a' : 'H:i');
}

function passivello_get_event_class($datetime)
{
    if ($datetime <= new DateTime()) {
        return 'event-past';
    }
    return '';
}

function passivello_get_datetime($datearr)
{
    // {"date":"2017-04-26 18:00:00.000000","timezone_type":1,"timezone":"+02:00"}
    return date_create($datearr["date"], timezone_open($datearr["timezone"]));
}

function passivello_getlink($dest)
{
    $eng = array(
        "privacy"        => "/en/cookies/",
        "statuto"        => "/en/statute/",
        "ammissione"     => "/en/admission/",
        "credits"        => "/en/credits/",
    );
    $ita = array(
        "privacy"        => "/it/biscotti/",
        "statuto"        => "/it/statuto/",
        "ammissione"     => "/it/ammissione/",
        "credits"        => "/it/crediti/"
    );
    $gen = array(
        "canaletg"       => "https://t.me/PoliEdroLive",
        "gruppotg"       => "https://t.me/PoliEdro",
        "instagram"      => "https://instagram.com/poliedro.polimi/",
        "paginafb"       => "https://facebook.com/poliedro.polimi/",
        "webcalfb"       => "webcal://www.facebook.com/ical/u.php?uid=100000067321453&key=AQDkp3yBO_amMi56"
    );


    if (get_locale() == "it_IT" && array_key_exists($dest, $eng))
        return $ita[$dest];
    else if (array_key_exists($dest, $eng))
        return $eng[$dest];
    else if (array_key_exists($dest, $gen))
        return $gen[$dest];
    else
        return "";
}

function _link($dest)
{
    echo passivello_getlink($dest);
}

?>
