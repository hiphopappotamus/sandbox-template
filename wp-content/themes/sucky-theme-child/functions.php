<?php
/**
 * This Theme Sucks Child Functions
 */
function sucky_theme_child_styles() {
 // TODO: when ready for prod, swap this with minified
 wp_enqueue_style('sucky-theme-child-main', get_stylesheet_directory_uri() . '/css/main.css', array());
}
add_action('wp_enqueue_scripts', 'sucky_theme_child_styles');