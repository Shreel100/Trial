<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
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
?>

</div><!-- #main -->

<footer class="local-footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-3">
        <h4><?php the_field('rula_lf_department_name', 'option') ?></h4>
        <p>
          <?php if ( get_field('rula_lf_location_link', 'option') ) : ?>
            <a href="<?php the_field('rula_lf_location_link', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="<?php the_field('rula_lf_location', 'option') ?>"><?php the_field('rula_lf_location', 'option') ?></a><br>            
          <?php else : ?>
            <?php the_field('rula_lf_location', 'option') ?><br>
          <?php endif ?>
          <?php the_field('rula_lf_address', 'option') ?><br>
          <?php if ( get_field('rula_lf_phone', 'option') ) { echo '<abbr title="Phone">P:</abbr> ' . get_field('rula_lf_phone', 'option') . '<br>'; } ?>
          <?php if ( get_field('rula_lf_fax', 'option') ) { echo 'Fax: ' . get_field('rula_lf_fax', 'option') . '<br>'; } ?>
          <?php if ( get_field('rula_lf_email', 'option') ) { echo 'Email: <a href="mailto:' . get_field('rula_lf_email', 'option') . '">' . get_field('rula_lf_email', 'option') . '</a>'; } ?>
        </p>
        <ul class="social">
          <?php if ( get_field('rula_sm_facebook', 'option') ) : ?>
            <li><a href="https://www.facebook.com/<?php the_field('rula_sm_facebook', 'option') ?>/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Facebook"><i class="fa fa-facebook"></i></a></li>
          <?php endif ?>          

          <?php if ( get_field('rula_sm_twitter', 'option') ) : ?>
            <li><a href="https://twitter.com/<?php the_field('rula_sm_twitter', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Twitter"><i class="fa fa-twitter"></i></a></li>
          <?php endif ?>

          <?php if ( get_field('rula_sm_flickr', 'option') ) : ?>
            <li><a href="https://www.flickr.com/photos/<?php the_field('rula_sm_flickr', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Flickr"><i class="fa fa-flickr"></i></a></li>
          <?php endif ?>
          
          <?php if ( get_field('rula_sm_instagram', 'option') ) : ?>
            <li><a href="https://www.instagram.com/<?php the_field('rula_sm_instagram', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Instagram"><i class="fa fa-instagram"></i></a></li>
          <?php endif ?>

          <?php if ( get_field('rula_sm_youtube', 'option') ) : ?>
            <li><a href="https://www.youtube.com/user/<?php the_field('rula_sm_youtube', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="YouTube"><i class="fa fa-youtube"></i></a></li>
          <?php endif ?>

          <?php if ( get_field('rula_sm_rss', 'option') ) : ?>
            <li><a href="<?php the_field('rula_sm_rss', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="RSS"><i class="fa fa-rss"></i></a></li>
          <?php endif ?>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h4>Links</h4>
        <nav class="local-footer-links">
          <?php if ( has_nav_menu('local-footer-menu') ): ?>
          <?php wp_nav_menu( array( 'theme_location' => 'local-footer-menu', 'container' => 'false' ) ); ?>
          <?php else: ?>
          <ul class="menu">
            <li><a href="https://library.torontomu.ca/services/disabilities/accessibility/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Accessibility Services">Accessibility Services</a></li>
            <li><a href="https://library.torontomu.ca/copyright" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Copyright Services">Copyright Services</a></li>
            <li><a href="https://library.torontomu.ca/info/about-us#contactus" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Contact Us">Contact Us</a></li>
            <li><a href="https://library.torontomu.ca/siteindex" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Site Index">Site Index</a></li>
          </ul>
          <?php endif ?>
        </nav>
      </div>
      <div class="col-xs-12 col-sm-6">
        <?php if ( get_field('rula_lf_map', 'option') ) : ?>
          <a href="<?php the_field('rula_lf_map_link', 'option') ?>" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Google Map">
            <img src="<?php the_field('rula_lf_map', 'option') ?>" alt="Google Map" class="map">
          </a>
        <?php endif ?>
      </div>
    </div>
  </div>
</footer>

<footer class="global-footer-top">
  <div class="container">
    <div class="row gft-top">
      <div class="col-xs-9 text-left">
        <a href="https://www.torontomu.ca/"><strong>Toronto Metropolitan University</strong></a><br>
      </div>
      <div class="col-xs-3 text-right">
        <a href="#gft-collapse" data-toggle="collapse" class="collapse-toggle collapsed"></a>
      </div>
    </div>

    <div id="gft-collapse" class="collapse">
      <div class="row gft-middle">
        <div class="col-xs-6 text-left">
          350 Victoria Street<br>
          Toronto, ON M5B 2K3<br>
          <abbr title="Phone">P:</abbr> (416) 979-5000<br>
        </div>
        <div class="col-xs-6 text-right">
          <p>Follow Toronto Metropolitan University</p>
          <ul class="social">
            <li><a href="https://www.facebook.com/torontomet" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/torontomet" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Instagram"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://twitter.com/torontomet"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/TorontoMetropolitanUniversity" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="YouTube"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/school/torontometropolitanuniversity/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="https://www.tiktok.com/@torontomet" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="TikTok"><i class="fa-brands fa-tiktok"></i></a></li>
          </ul>
        </div>
        <div class="col-xs-12">
          <div class="row gft-bottom">
            <div class="col-xs-6 text-left">
              <ul class="global-footer-links">
                <li><a href="https://www.torontomu.ca/contact/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Directory">Directory</a></li>
                <li><a href="https://www.torontomu.ca/maps/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Maps and Directions">Maps and Directions</a></li>
              </ul>
            </div>
            <div class="col-xs-6 text-right">
              <ul class="global-footer-links">
                <li><a href="https://www.torontomu.ca/careers/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Careers">Careers</a></li>
                <li><a href="https://www.torontomu.ca/media/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Media Room">Media Room</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</footer>

<footer class="global-footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="global-footer-links">
          <li><a href="https://www.torontomu.ca/privacy/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Privacy Policy">Privacy Policy</a></li>
          <li><a href="https://www.torontomu.ca/accessibility/" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Accessibility">Accessibility</a></li>
          <li><a href="https://www.torontomu.ca/terms-conditions" ga-on="click" ga-event-category="Navigation" ga-event-action="Footer click" ga-event-label="Terms & Conditions">Terms &amp; Conditions</a></li>
        </ul>
      </div>
    </div>
    
  </div>
</footer>

<?php if ( rula_wordpress_feature_flag('enable_calendly_embeds') ) : ?>
<!-- Calendly link script begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<!-- Calendly link script end -->

<style type="text/css">
  /* Fix second scrollbar introduced by Calendly */
  body {
    overflow: initial;
  }
</style>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>