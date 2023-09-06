<?php
/*
Template Name: Team Members
*/
get_header(); ?>

<div class="container" style="margin-top: 1em;">

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