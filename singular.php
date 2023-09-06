<?php
/**
 * The template for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 1.27.x
 */

get_header();
?>

<div class="container" style="margin-top: 1em;">

  <div class="row">

    <div id="primary" class="col-xs-12 col-md-9">
          
    <?php rylib_wp_breadcrumbs(); ?>

      <?php
      if ( have_posts() ) {

        while ( have_posts() ) {
          the_post();
        
          if ( get_post_type() == 'post') { 
            rylib_wp_post_navigation(); 
          }
        
          get_template_part( 'template-parts/content', get_post_type() );

          // only show comments box template on blog posts
          if ( get_post_type() == 'post') { 
            comments_template( '', true );
          }
        }
      }

      ?>

    </div><!-- #primary -->

    <?php get_sidebar( get_post_type() ); ?>

  </div><!-- .row -->

</div><!-- .container -->

<?php get_footer(); ?>
