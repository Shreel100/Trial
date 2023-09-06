<style>
.rula-home-top {
  background: url('<?php bloginfo('stylesheet_directory'); ?>/images/rula-home-top-bg.jpg');
  background-size: cover;
  background-position: center;
  padding: 8em 0;
  margin-bottom: 1em;
} 

.ask-us-banner {
  background: #002d72; 
  text-align: center;
}

.ask-us-banner .btn {
  display: block;
  font-weight: 700;
  border: none;
  line-height: 35px;
  white-space: normal;
}

.ask-us-banner .btn-primary:hover,
.ask-us-banner .btn-primary:focus {
  border: none;
  background: #FCFCFC;
  color: #2B2B2B;
}

@media (min-width: 992px) {
  .ask-us-banner .btn-primary:hover,
  .ask-us-banner .btn-primary:focus {
    background: #004C9B;
    /*background: #5BC2F4;*/
  }
}

.cta-widget {
  flex-grow: 1;
  padding: 0 5px;
}

.cta-widget:first-child {
  padding-left: 0;
}
.cta-widget:last-child {
  padding-right: 0;
}
</style>

<div class="rula-home-top">
  <div class="container">
    <div class="row">
      <div class="col-xs-12"><?php get_template_part('shortcodes/rylib-search-tabs/search-tabs'); ?></div>
    </div>

    <?php get_template_part('shortcodes/rylib-cta-widgets/cta-widgets'); ?>

  </div>
  <div class="container" style="margin-top: 100px; margin-bottom: -100px;">
    <p style="color: white;">Photo taken with Library Research Drone Technology</p>
  </div>
</div>

