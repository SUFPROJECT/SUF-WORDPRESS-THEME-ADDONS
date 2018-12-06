<?php

namespace SUF\Modules\DisableGoogleFonts;

function head_cleanup() {
    remove_action('wp_head', 'wp_resource_hints', 2);
}

add_action('init', __NAMESPACE__ . '\\head_cleanup');

//add_filter('gettext_with_context',  __NAMESPACE__.'\\disable_montserrat', 888, 4);
//add_filter('gettext_with_context', __NAMESPACE__.'\\disable_noto_serif', 888, 4);
//add_action('after_setup_theme', __NAMESPACE__.'\\register_theme_fonts_disabler', 1);

function action_links($links, $plugin_file)
{
    _deprecated_function(__METHOD__, '1.3');

    return $links;
}

function disable_open_sans($translations, $text, $context, $domain)
{
    if ('Open Sans font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_lato($translations, $text, $context, $domain)
{
    if ('Lato font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_source_sans_pro($translations, $text, $context, $domain)
{
    if ('Source Sans Pro font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_bitter($translations, $text, $context, $domain)
{
    if ('Bitter font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_noto_sans($translations, $text, $context, $domain)
{
    if ('Noto Sans font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_noto_serif($translations, $text, $context, $domain)
{
    if ('Noto Serif font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_inconsolata($translations, $text, $context, $domain)
{
    if ('Inconsolata font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_merriweather($translations, $text, $context, $domain)
{
    if ('Merriweather font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_montserrat($translations, $text, $context, $domain)
{
    if ('Montserrat font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}

function disable_libre_franklin($translations, $text, $context, $domain)
{
    if ('Libre Franklin font: on or off' == $context && 'on' == $text) {
        $translations = 'off';
    }

    return $translations;
}
