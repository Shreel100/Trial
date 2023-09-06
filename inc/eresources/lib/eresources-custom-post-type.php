<?php 
/**
 * Creates the eResources custom post type
 * @since RULA 1.7.x
 */
add_action( 'init', 'rula_wordpress_create_post_type_eresources' );
function rula_wordpress_create_post_type_eresources() {
  register_post_type( 'eresources',
    array(
      'labels' => array(
        'name' => __( 'eResources' ),
        'singular_name' => __( 'eResource' ),
        'add_new_item' => __( 'Add New eResource' ),
        'edit_item' => __( 'Edit eResource' ),
        'new_item' => __( 'New eResource' ),
        'view_item' => __( 'View eResource' ),
        'view_items' => __( 'View eResources' ),
        'search_items' => __( 'Search eResources' )
      ),
      'public' => true,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-search',
      'hierarchical' => true,
      'supports' => array(
        'title', 'editor', 'revisions', 'page-attributes'
      ),
      'has_archive' => false,
      'rewrite' => array(
        'slug' => 'eresource',
        'with_front' => false
      )
    )
  );
}

/**
 * Sorts the eResources by title on archive page
 * @since RULA 1.7.x
 */
function rula_wordpress_eresources_sort_order($query) {
  if ( !is_admin() && is_post_type_archive('eresources') ) {
    $query->set( 'order', 'ASC' );
    $query->set( 'orderby', 'title' );
  }
  return $query;
}
