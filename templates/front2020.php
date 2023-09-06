<?php
/**
 * Template Name: 2020 Front Page Template
 * The template for displaying our homepage. 
 * 
 * Activate by setting "Your homepage displays" under 
 * Appearance > Customize > Homepage Settings to "A static page"
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

get_header(); ?>

<?php get_template_part('partials/hero-banner') ?>

<div class="container" style="margin-top: 2em;">

  <div class="row">
    <div class="col-xs-12">

      <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
              <?php remove_filter( 'the_content', 'wpautop' ); the_content(); ?>
              <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <footer class="entry-meta">
              <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-meta -->

          </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->

    </div><!-- #primary -->

  </div>

</div>

<?php get_footer(); ?>
