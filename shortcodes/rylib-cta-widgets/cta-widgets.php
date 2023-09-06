<?php // ACF Flexible Content Templating for CTA Widgets Rebuild with Flexbox ?>
<?php if ( have_rows('rula_cta_widgets', 'options') ) : ?>
  <div style="display: flex;">
  <?php while( have_rows('rula_cta_widgets', 'options') ): the_row(); ?>
    <div class="cta-widget">
    <?php if ( get_row_layout() == 'link' ) : ?>
      <a href="<?php the_sub_field('link_url') ?>" class="ryerson-btn" class="ryerson-btn" ga-on="click" ga-event-category="Call To Action" ga-event-action="Widget click" ga-event-label="<?php the_sub_field('link_text') ?>"><?php the_sub_field('link_text') ?></a>
    <?php elseif ( get_row_layout() == 'custom_code' ) : ?>
      <?php the_sub_field('code'); ?>
    <?php endif; ?>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif; ?>