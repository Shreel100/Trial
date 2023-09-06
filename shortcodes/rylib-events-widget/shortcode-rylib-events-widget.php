<?php 
function rylib_events_widget_register_scripts() {
  wp_register_style( 'rylib-events-widget-css', get_template_directory_uri().'/shortcodes/rylib-events-widget/events-widget.css', array(), THEME_VERSION );
  // wp_register_script( 'rylib-events-widget-js', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.js', array('jquery'), THEME_VERSION, true );
}
add_action('wp_enqueue_scripts', 'rylib_events_widget_register_scripts');

if ( !function_exists('rylib_events_widget_filter') ) {
  function rylib_events_widget_filter($e) {
    return strtotime($e['date']) <= strtotime('friday +1 week', time());;
  }
}

function rylib_events_widget_shortcode() {
  wp_enqueue_style('rylib-events-widget-css');
  // wp_enqueue_script('rylib-events-widget-js');

  ob_start();
  require 'events-widget.php';
  $content = ob_get_contents();
  ob_end_clean();
  
  return $content;
}
add_shortcode('rylib-events-widget', 'rylib_events_widget_shortcode');
