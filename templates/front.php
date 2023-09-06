<?php
/**
 * Template Name: Front Page Template
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

// TODO: Migrate all sites to use front2020.php and remove this template

get_header(); ?>

<?php if ( is_main_site() ) : ?>
  <?php get_template_part('partials/rula-home-top') ?>
<?php endif ?>

<?php get_template_part('partials/front-page-slider') ?>

<div class="container" style="margin-top: 1em;">

  <div class="row">
    <?php // TODO: remove sidebar-2 after ensuring all sites do not use the "Frontpage Sidebar" anymore ("Frontpage Sidebar") ?>
    <?php if ( is_active_sidebar('sidebar-2') ) : ?>  
    <div class="col-xs-12 col-md-9">
    <?php else : ?>
    <div class="col-xs-12">
    <?php endif ?>

      <div id="content" role="main">

        <?php get_template_part('shortcodes/rylib-featured-titles/featured-titles'); ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
              <?php remove_filter( 'the_content', 'wpautop' ); the_content(); ?>
              <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <!-- Flex Blocks -->
            <?php get_template_part('partials/flex-blocks'); ?>

            <footer class="entry-meta">
              <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-meta -->

          </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->

    </div><!-- #primary -->

    <?php // TODO: remove sidebar-2 after ensuring all sites do not use the "Frontpage Sidebar" anymore ("Frontpage Sidebar") ?>
    <?php if ( is_active_sidebar('sidebar-2') || rylib_wp_get_acf_sidebar( get_the_ID() ) !== false ) : ?>  
      <?php get_sidebar( get_post_type() ); ?>
    <?php endif; ?>

  </div>

</div>

<?php get_footer(); ?>
