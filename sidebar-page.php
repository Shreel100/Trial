<?php
/**
 * The Sidebar containing the pages widget area.
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.5
 */

/** WARNING
 * This theme is intended to be used in conjunction with the GitHub Updater
 * plugin (https://github.com/afragen/github-updater). Changes made to files
 * in this theme directly in the WordPress theme editor will be overwritten
 * during automatic updates.
 */

?>

<div class="col-xs-12 col-sm-3 widget-area" role="complementary">
  
  <?php $acf_sidebar_id = rylib_wp_get_acf_sidebar( get_the_ID() ); ?>
  <?php if ( have_rows('acf_sidebar_flexible_content', $acf_sidebar_id) ) : ?>
    
    <?php while ( have_rows('acf_sidebar_flexible_content', $acf_sidebar_id) ) : the_row(); ?>
      <?php if ( get_row_layout() == 'html_code' ) : ?>
        <?php echo do_shortcode( get_sub_field('html_code_field') ); ?>
      <?php elseif ( get_row_layout() == 'page_hierarchy' ) : ?>
        <?php echo do_shortcode( '[rl_page_hierarchy]' ); ?>
      <?php endif; ?>
    <?php endwhile; ?>
    
  <?php elseif ( is_front_page() && !is_active_sidebar('sidebar-2') ) : ?>
    <?php // TODO: remove sidebar-2 after ensuring all sites do not use the "Frontpage Sidebar" anymore ("Frontpage Sidebar") ?>
  <?php elseif ( is_front_page() && is_active_sidebar('sidebar-2') ) : ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
  <?php elseif ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

    <aside id="pages" class="widget">
      <h3 class="widget-title"><?php _e( 'Pages', 'twentyeleven' ); ?></h3>
      <ul>
        <?php wp_list_pages(array(
          'depth' => 1
        )); ?> 
      </ul>
    </aside>
    
  <?php endif; // end sidebar widget area ?>

  <?php 
  /* Creates the wp_meta action hook.
   * See: https://codex.wordpress.org/Function_Reference/wp_meta */
    wp_meta();
  ?>

</div><!-- #secondary .widget-area -->
