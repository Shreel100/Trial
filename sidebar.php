<?php
/**
 * The default sidebar when calling get_sidebar()
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.1
 */

/** WARNING
 * This theme is intended to be used in conjunction with the GitHub Updater
 * plugin (https://github.com/afragen/github-updater). Changes made to files
 * in this theme directly in the WordPress theme editor will be overwritten
 * during automatic updates.
 */

?>

<div class="col-xs-12 col-md-3 widget-area" role="complementary">
  
  <?php if ( have_rows('acf_sidebar_flexible_content') ) : ?>
    
    <?php while ( have_rows('acf_sidebar_flexible_content') ) : the_row(); ?>
      <?php if ( get_row_layout() == 'html_code' ) : ?>
        <?php echo do_shortcode( get_sub_field('html_code_field') ); ?>
      <?php elseif ( get_row_layout() == 'page_hierarchy' ) : ?>
        <?php echo do_shortcode( '[rl_page_hierarchy]' ); ?>
      <?php endif; ?>
    <?php endwhile; ?>

  <?php elseif ( ! dynamic_sidebar( 'sidebar-6' ) ) : ?>

    <aside id="categories" class="widget">
      <h3 class="widget-title"><?php _e( 'Categories', 'twentyeleven' ); ?></h3>
      <ul>
        <?php wp_list_categories('title_li='); ?>
      </ul>
    </aside>
    
  <?php endif; // end sidebar widget area ?>

  <?php 
  /* Creates the wp_meta action hook.
   * See: https://codex.wordpress.org/Function_Reference/wp_meta */
    wp_meta();
  ?>
</div><!-- #secondary .widget-area -->
