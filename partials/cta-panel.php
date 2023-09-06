<?php if ( get_field('cta_panel_enabled', 'option') ) : ?>
<style type="text/css">
.cta-panel {
  background: #FFA300;
  font-weight: 700;
  padding: 5px 10px;
}

.cta-panel a {
  color: #000;
}
</style>

<div class="container navbar-fixed-bottom hidden-xs">
  <div class="row">
    <div class="col-xs-12">
      <div class="cta-panel pull-right">
        <a href="<?php the_field('cta_panel_link', 'option'); ?>" ga-on="click" ga-event-category="Call To Action" ga-event-action="click" ga-event-label="<?php the_field('cta_panel_message', 'option'); ?>"><?php the_field('cta_panel_message', 'option'); ?></a>
      </div>
    </div>
  </div>
</div>

<?php endif ?>
