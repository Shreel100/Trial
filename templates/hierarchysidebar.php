<?php
/**
 * Template Name: Page Hierarchy Sidebar Template
 *
 * Description: A Page Template with a sidebar with the current page's hierarchy.
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 1.24.x
 */

/** WARNING
 * This theme is intended to be used in conjunction with the GitHub Updater
 * plugin (https://github.com/afragen/github-updater). Changes made to files
 * in this theme directly in the WordPress theme editor will be overwritten
 * during automatic updates.
 */

get_header(); ?>

<div class="container" style="margin-top: 1rem;">

  <div class="row">

    <div id="primary" class="col-xs-12 col-md-9">

    <?php rylib_wp_breadcrumbs(); ?>

      <div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
        <?php endwhile; // end of the loop. ?>
      </div><!-- #content -->

    </div><!-- #primary -->

    <div class="col-xs-12 col-md-3 widget-area" role="complementary">
      <?php echo do_shortcode( '[rl_page_hierarchy]' ); ?>
    </div><!-- #secondary .widget-area -->

  </div>
</div>

<?php get_footer(); ?>
