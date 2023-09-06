<?php
// Helper function only used in this template
function rula_lh_text() {
  if ( rula_wordpress_feature_flag('rula_lh_show_donor') ) {
    $lh_text = '<span class="rula_lh_donor">'. get_field('rula_lh_donor_name', 'option') .' </span>' . get_bloginfo( 'name' );
  } else {
    $lh_text = get_bloginfo( 'name' );
  }
  return $lh_text;
}
?>

<header class="local-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      <?php if ( is_front_page() ): ?>
        <h1><a href="<?php echo home_url(); ?>"><?php echo rula_lh_text(); ?></a></h1>
      <?php else: ?>
        <span class="h1"><a href="<?php echo home_url(); ?>"><?php echo rula_lh_text(); ?></a></span>
      <?php endif ?>
      </div>
    </div>
  </div>
  <?php if ( has_nav_menu('local-header-menu') ): ?>
  <div class="local-header-navigation">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">Home</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#local-header-navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <i class="fa fa-angle-down" title="Toggle navigation"></i>
        </button>
      </div>
      <?php
      wp_nav_menu( array(
          'theme_location'    => 'local-header-menu',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'local-header-navbar',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
      ) );
      ?>
    </div>
  </div>
  <?php endif ?>
</header>

