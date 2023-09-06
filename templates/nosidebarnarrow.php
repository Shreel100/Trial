<?php
/**
 * Template Name: No Sidebar Narrow Template
 *
 * Description: A Page Template with no sidebar, i.e. only one column, and
 * content width limited to 768px.
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

get_header(); ?>

<div class="container" style="max-width: 768px; margin-top: 1em;">

  <div class="row">

    <div id="primary" class="col-xs-12">

    <?php rylib_wp_breadcrumbs(); ?>

      <div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
        <?php endwhile; // end of the loop. ?>
      </div><!-- #content -->

    </div><!-- #primary -->

  </div>
</div>

<?php get_footer(); ?>
