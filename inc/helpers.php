<?php 
/**
 * Helper that outputs the breadcrumbs
 * @since RULA 2.0.x
 */
function rylib_wp_breadcrumbs() {
  if ( !is_front_page() && function_exists('bcn_display') ) {
    echo '<div class="breadcrumbs">';
    bcn_display();
    echo '</div>';
  }
}

/**
 * Handy helper to find the closest ACF Sidebar up the page hierarchy.
 * Returns nothing if one isn't found.
 * @since RULA 1.27.x
 */
function rylib_wp_get_acf_sidebar($post_id) {
  // Check if the specified post has an ACF Sidebar, else recurse up the parent until root..
  if ($post_id == false) {
    return $post_id;
  } elseif ( have_rows('acf_sidebar_flexible_content', $post_id) ) {
    return $post_id;
  } 

  return rylib_wp_get_acf_sidebar( wp_get_post_parent_id($post_id) );
} 

/**
 * Handy helper to render post navigation
 * @since RULA 1.27.x
 */
function rylib_wp_post_navigation() { ?>
  <nav id="nav-single">
    <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
    <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
    <span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
  </nav><!-- #nav-single -->
<?php } // rylib_wp_post_navigation()

/**
 * Handy helper function to determine if feature flags are enabled.
 * @since RULA 1.6.x
 */
// TODO: update calls to this function to rylib_wp_ff
function rula_wordpress_feature_flag($flag_slug="") {
  return rylib_wp_ff($flag_slug);
}

/**
 * Handy helper function to determine if feature flags are enabled.
 * @since RULA 1.27.x
 */
function rylib_wp_ff($flag_slug = "") {
  if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    if ( get_field( $flag_slug, 'options' ) ) {
      return true;
    }
  }
  return false;
}

/**
 * Handy helper function to include theme images in templates
 * @since RULA 1.6.x
 */
function rula_wordpress_image($filename, $alt="", $classes=null) {
  $imgpath = get_template_directory_uri() . '/images/' . $filename;

  echo "<img src=\"{$imgpath}\"";
  if ( isset($alt) ) {
    echo " alt=\"{$alt}\"";
  }
  if ( isset($classes) ) {
    $classes_string = implode(" ", $classes);
    echo " class=\"{$classes_string}\"";
  }
  echo ">";
}


/**
 * Handy helper function to generate the includes url for assets in this theme
 * @since RULA 1.27.x
 */
function rylib_wp_includes_url($filename) {
  return get_template_directory_uri() . '/inc/' . $filename ;
}

/**
 * Enables fetching of navigation menus from another site on a multisite
 * installation.
 * @since RULA 1.18.x
 */
function rula_wordpress_multisite_nav_menu( $args = array(), $origin_id = 1 ) {
  global $blog_id;
  $origin_id = absint( $origin_id );

  if ( !is_multisite() || $origin_id == $blog_id ) {
    wp_nav_menu( $args );
    return;
  }

  switch_to_blog( $origin_id );
  wp_nav_menu( $args );   
  restore_current_blog();
}