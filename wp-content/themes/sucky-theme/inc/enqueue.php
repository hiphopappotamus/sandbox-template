<?php

/**
 * Enqueue scripts and styles.
 */
// exit if accessed directly
defined('ABSPATH') || exit;
function sucky_theme_scripts()
{

  wp_enqueue_script('jquery');

  // custom javascript array
  $js_dir = '/js';
  $js_files = array(
    '/background-parallax.js',
    '/sandbox.js',
    '/parallax-implement.js',
  );

  foreach ($js_files as $file) {
    wp_enqueue_script(str_replace(['/', '.', 'js'], '', $file), get_template_directory_uri() . $js_dir . $file, null, null, true);
  }

  wp_register_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css');
  wp_enqueue_style('Bootstrap');

  wp_register_script('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js', null, null, true);
  wp_enqueue_script('Bootstrap');

  wp_register_style('FontAwesome', 'https://use.fontawesome.com/releases/v5.15.3/css/all.css');
  wp_enqueue_style('FontAwesome');

  wp_enqueue_style('sucky-theme-style', get_stylesheet_uri(), array(), _S_VERSION);

  wp_enqueue_style('sucky-theme-mainstyle', get_template_directory_uri() . '/css/main.css', array());
  wp_style_add_data('sucky-theme-style', 'rtl', 'replace');

  wp_enqueue_script('sucky-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'sucky_theme_scripts');