<?php get_template_part('partials/global-header-top'); ?>

<?php if ( has_nav_menu('global-header-menu') ): ?>
<header class="global-header-bottom">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">Home</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-header-bottom" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-angle-down" title="Toggle navigation"></i>
      </button>
    </div>
    <?php
    wp_nav_menu( array(
      'theme_location'    => 'global-header-menu',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'global-header-bottom',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
    ?>
  </div>
</header>
<?php endif ?>
