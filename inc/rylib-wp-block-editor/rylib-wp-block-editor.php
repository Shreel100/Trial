<?php 
add_action('enqueue_block_assets', function() {
  wp_register_style( 'rylib-wp-block-editor-css', get_template_directory_uri() . '/inc/rylib-wp-block-editor/rylib-wp-block-editor.css' );
  wp_enqueue_style('rylib-wp-block-editor-css');
});

add_action('after_setup_theme', function() {
  if(!function_exists('register_block_style')) return;

  // Enable custom editor styles
  // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
  add_theme_support( 'editor-styles' );
  add_editor_style( 'style-editor.css' );

  // Disables custom color selection
  // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
  add_theme_support( 'disable-custom-colors' );
  add_theme_support( 'editor-color-palette', array() );

  // Disable block gradients
  // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-gradient-presets
  add_theme_support( 'editor-gradient-presets', array());

  // Disables custom font size selection
  // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
  add_theme_support( 'disable-custom-font-sizes' );
  add_theme_support( 'editor-font-sizes', array() );

  // Disables the ability to set custom gradients
  // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
  add_theme_support( 'disable-custom-gradients' );

  // register_block_style(
  //   'core/button',
  //   array(
  //     'name'         => 'white-on-ryerson-blue',
  //     'label'        => __( 'White on Ryerson Blue' ),
  //     'style_handle' => 'rylib-wp-block-editor-css',
  //   )
  // );
  // unregister_block_style('core/button', 'white-on-ryerson-blue');

  add_action( 'enqueue_block_editor_assets', function () {
    wp_enqueue_script(
      'rylib-wp-block-editor-js',
      get_template_directory_uri() . '/inc/rylib-wp-block-editor/rylib-wp-block-editor.js',
      array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
      THEME_VERSION
    );
  } );
});
