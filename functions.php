<?php

//Load Main Scripts
function enqueue_bone_dry_scripts()
{
    wp_enqueue_script('Ajax-Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false, null, true, null);
    wp_enqueue_script('Bootstrap-4.1.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.1.0/js/all.js', false, null, null, false);
    wp_enqueue_script('crafted-brew-scripts', get_template_directory_uri() . '/lib/js/bone-dry.js', array('jquery'), null, true, null);
}
add_action('wp_enqueue_scripts', 'enqueue_bone_dry_scripts');

//Load CSS
function enqueue_bone_dry_styles()
{
    wp_enqueue_style('bootstrap-4.1.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('crafted-brew-styles', get_template_directory_uri() . '/style.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_bone_dry_styles');