<?php 
function rylib_search_tabs_register_scripts() {
  // wp_register_style( 'rl-page-hierarchy-css', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.css', array(), THEME_VERSION );
  // wp_register_script( 'rl-page-hierarchy-js', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.js', array('jquery'), THEME_VERSION, true );
}
add_action('wp_enqueue_scripts', 'rylib_search_tabs_register_scripts');

function rylib_search_tabs_shortcode() {
  // wp_enqueue_style('rl-page-hierarchy-css');
  // wp_enqueue_script('rl-page-hierarchy-js');

  // TODO: reimplement this more cleanly...
  ob_start();
  require 'search-tabs.php';
  $content = ob_get_contents();
  ob_end_clean();
  
  return $content;
}
add_shortcode('rylib-search-tabs', 'rylib_search_tabs_shortcode');
