<?php
// Compatability patch for the list-pages-shortcode plugin. The original plugin was abandoned, and 
// had possible security vulnerabilities
add_action( 'init', 'tmulibs_list_pages_shortcode_patch', 20 );
function tmulibs_list_pages_shortcode_patch() {
  // remove original shortcodes from the list-pages-shortcode plugin if they exist
  if ( shortcode_exists('list-pages') ) { remove_shortcode('list-pages'); }
  if ( shortcode_exists('sibling-pages') ) { remove_shortcode('sibling-pages'); }
  if ( shortcode_exists('child-pages') ) { remove_shortcode('child-pages'); }

  // add our own shortcode, we only use child-pages
  add_shortcode( 'child-pages', 'tmulibs_child_pages_shortcode' );
}

function tmulibs_child_pages_shortcode( $atts ) {
  $post_id = get_the_ID();

	$atts = shortcode_atts( array(
    'child_of' => $post_id,
		'sort_column' => 'post_title',
		'depth' => 0,
    'echo' => false,
    'title_li' => null
	), $atts, 'child-pages' );

  $pages = wp_list_pages($atts);

  return '<ul class="list-pages-shortcode child-pages">' . $pages . '</ul>';
}