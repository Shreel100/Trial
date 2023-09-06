<header class="global-header-top">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav class="navbar">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

              <!-- RULA Logo standalone site compatability -->
              <?php if ( is_multisite() ) {
                $home_url = network_home_url();
              } else {
                $home_url = home_url();
              } ?>

              <a class="navbar-brand" href="<?php echo $home_url; ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Header click" ga-event-label="Logo"><?php rula_wordpress_image('TMU-Libraries-rgb.png', 'Toronto Metropolitan University Library'); ?></a>

              <div class="navbar-toggle-wrap">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-search-form" aria-expanded="false">
                  <span class="sr-only">Toggle search form</span>
                  <i class="fa fa-search" title="Toggle search form"></i>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navigation" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <i class="fa fa-bars" title="Toggle navigation"></i>
                </button>
              </div>
            </div>

            <!-- Site Search -->
            <?php if ( is_main_site() ) {
              $site_search_label = 'Search library.torontomu.ca';
            } else {
              $site_search_label = 'Search this website';
            } ?>

            <div class="collapse navbar-collapse navbar-left" id="site-search-form">
              <div class="rylib-search-form">
                <form action="<?php echo home_url('/'); ?>" method="get" class="navbar-form form-track-submits" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Site search" data-ga-event-label="Search WordPress">
                  <label for="site-search" class="sr-only"><?php echo $site_search_label ?></label>
                  <input id="site-search" type="text" name="s" placeholder="<?php echo $site_search_label ?>">
                  <button aria-label="Search" type="submit"><i class="fa fa-search" title="Search"></i></button>
                </form>
              </div>
            </div>

            <!-- Global Header Top Navigation Area -->
            <div class="collapse navbar-collapse navbar-right" id="global-navigation">
              <ul class="nav navbar-nav" role="navigation">
                <?php 
                $args = array(
                    'theme_location'  => 'global-header-top-menu',
                    'container'       => false,
                    'items_wrap'      => '%3$s',
                  );
                if ( has_nav_menu('global-header-top-menu') ) {
                  wp_nav_menu($args);
                } else {
                  rula_wordpress_multisite_nav_menu($args);
                }
                ?>
              </ul>
            </div>
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </div>
  </div>
</header>
