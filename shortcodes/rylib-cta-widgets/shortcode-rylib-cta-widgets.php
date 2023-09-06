<?php 
function rylib_cta_widgets_register_scripts() {
  // wp_register_style( 'rl-page-hierarchy-css', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.css', array(), THEME_VERSION );
  // wp_register_script( 'rl-page-hierarchy-js', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.js', array('jquery'), THEME_VERSION, true );
}
add_action('wp_enqueue_scripts', 'rylib_cta_widgets_register_scripts');

function rylib_cta_widgets_shortcode() {
  // wp_enqueue_style('rl-page-hierarchy-css');
  // wp_enqueue_script('rl-page-hierarchy-js');

  // TODO: reimplement this more cleanly...
  // TODO: remove cta-widgets entirely
  ob_start();
  require 'cta-widgets.php';
  $content = ob_get_contents();
  ob_end_clean();
  
  return $content;
}
add_shortcode('rylib-cta-widgets', 'rylib_cta_widgets_shortcode');
