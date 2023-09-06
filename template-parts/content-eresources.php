<?php
/**
 * The template for displaying our eResources connect page content
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 1.27.x
 */
?>

<?php 
// TODO: Remove this temporary code that sets the default value for the show_connect_panel field
if ( is_null(get_field('show_connect_panel')) ) {
  update_field('show_connect_panel', true);
}
?>

<div class="row">
  <div class="col-xs-12 col-md-8">    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php if( get_field('show_connect_panel') && !empty(get_field('eresource_link') ) ) : ?>
      <div class="eresources-connect clear">
        <div class="eresources-connect-header col-xs-12">
          <a href="<?php the_field('eresource_link') ?>" ga-on="click" ga-event-category="Search / Resource Discovery" ga-event-action="eResources connect" ga-event-label="<?php the_title(); ?>"><?php rula_wordpress_image('eresources-connect.png') ?></a>
          <span class="h3"><a href="<?php the_field('eresource_link') ?>" ga-on="click" ga-event-category="Search / Resource Discovery" ga-event-action="eResources connect" ga-event-label="<?php the_title(); ?>">Connect</a></span>
          <p><a href="<?php the_field('eresource_link') ?>" ga-on="click" ga-event-category="Search / Resource Discovery" ga-event-action="eResources connect" ga-event-label="<?php the_title(); ?>">to <?php the_title(); ?></a></p>
        </div>
        <div class="eresources-connect-content col-xs-12">
          <span class="h5">Number of simultaneous users</span>
          <p><?php the_field('simultaneous_users') ?></p>
          <span class="h5">Allowable Uses</span>
          <p>
            <?php the_field('allowable_uses') ?>
            <?php if ( get_field('usage_information_link') ) : ?><br><a href="<?php the_field('usage_information_link') ?>">View detailed usage information</a><?php endif; ?> 
          </p>
          <p></p>
        </div>
      </div>

      <h2>Description</h2>
      <?php endif; ?>

      <?php the_field('description'); ?>
    </article>
  </div>

  <aside class="col-xs-12 col-md-4">
    <?php the_field('sidebar_content') ?>
    <?php if ( get_field('resources') ) : ?>
      <h2>Resources</h2>
      <?php the_field('resources') ?>
    <?php endif; ?>
    <?php if ( get_field('tutorials') ) : ?>
      <h2>Tutorials</h2>
      <?php the_field('tutorials') ?>
    <?php endif; ?>
    <?php if ( get_field('help') ) : ?>
      <h2>Help</h2>
      <?php the_field('help') ?>
    <?php endif; ?>
  </aside>
</div>

<footer class="entry-meta">
  <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-meta -->