<?php 
add_action('wp_enqueue_scripts', 'rylib_eresources_register_scripts');
function rylib_eresources_register_scripts() {
  wp_register_style( 'rylib-eresources', get_template_directory_uri().'/inc/eresources/eresources.css', array(), THEME_VERSION );
}

/**
 * Forces the No Sidebar template for eResource single pages
 * @since RULA 1.27.x
 */
add_filter( 'template_include', 'rylib_eresources_default_template', 99 );
function rylib_eresources_default_template( $template ) {
  if ( is_singular( 'eresources' )  ) {
      $default_template = locate_template( array( 'templates/nosidebar.php' ) );
      if ( '' != $default_template ) {
          return $default_template ;
      }
  }
  return $template;
}

/**
 * Note about Breadcrumb NavXT compatibility. Because we don't have an archive
 * enabled for this custom post type, the default "root" page will be the main
 * page. To get it to work correctly, we need to set the root page in the
 * Breadcrumb NavXT settings.
 * */ 

include_once( 'lib/eresources-custom-post-type.php' );
include_once( 'lib/shortcode-rylib-eresources-list.php' );
