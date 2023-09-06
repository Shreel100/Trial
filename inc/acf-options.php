<?php
/**
 * Our custom settings pages in the Wordpress Admin
 * - General Settings
 * - Appearance Settings
 * - Featured Titles
 * - Summon Options
 */
if ( function_exists('acf_add_options_page') ) {

  // Add these settings pages on all sites
  $rula_acf_options = acf_add_options_page(array(
    'page_title' => 'RULA Options',
    'capability' => 'edit_posts'
  )); 
  acf_add_options_sub_page(array(
    'page_title'  => 'General Settings',
    'menu_slug' => 'rula-general-settings',
    'parent_slug'   => $rula_acf_options['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Appearance',
    'menu_slug' => 'rula-appearance-settings',
    'parent_slug'   => $rula_acf_options['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Events Widget Shortcode',
    'menu_slug' => 'rylib-events-widget-settings',
    'parent_slug'   => $rula_acf_options['menu_slug'],
  ));

  // Add these settings pages on the main site
  if ( is_main_site() ) {
    acf_add_options_sub_page(array(
      'page_title'  => 'Main Site Settings',
      'menu_slug'   => 'rula-main-site-settings',
      'parent_slug' => $rula_acf_options['menu_slug'],
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Featured Titles',
      'menu_slug' => 'rula-featured-titles',
      'parent_slug'   => $rula_acf_options['menu_slug'],
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Summon Options',
      'menu_slug' => 'rula-summon-options',
      'parent_slug'   => $rula_acf_options['menu_slug'],
    ));
  }
}

/**
 * Randomizes the output of the featured titles slider (Only when viewing the site, not in admin!)
 * @since RULA 1.15.x
 */
function rula_wordpress_shuffle_repeater( $value, $post_id, $field ) {
  // Only manipulate the values if it is the featured titles slider
  if ( $field['_name'] == 'featured_titles') {
    shuffle($value);
  }
  return $value;
}
if ( !is_admin() && rula_wordpress_feature_flag('featured_titles_shuffle_items') ) { 
  add_filter('acf/load_value/type=repeater', 'rula_wordpress_shuffle_repeater', 10, 3);
}
