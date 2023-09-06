<?php 
/* 
  WARNING: This theme is intended to be used in conjunction with the GitHub 
  Updater plugin (https://github.com/afragen/github-updater). Changes made to 
  files in this theme directly in the WordPress theme editor will be overwritten 
  during automatic updates.
*/
?>

<?php /* FEATURE FLAG FOR NEW "NEW TITLES" SLIDER */ ?>
<?php if ( get_field('featured_titles', 'option') ) : ?>
  <div class="featured-titles">
    <?php if ( get_field('featured_titles_tag', 'option') ) : ?>
    <span class="ribbon ribbon-right ribbon-<?php echo the_field('featured_titles_tag_colour', 'option'); ?>"><a href="<?php the_field('featured_titles_link', 'option'); ?>" ga-on="click" ga-event-category="Featured Titles Slider" ga-event-action="click" ga-event-label="<?php the_field('featured_titles_tag', 'option')?>"><?php the_field('featured_titles_tag', 'option')?></a></span>
    <?php endif; ?>
    
    <div class="jcarousel">
      <ul>
        <?php while( have_rows('featured_titles', 'option') ): the_row(); ?>
          <?php
            // TODO: Update this code to take into account ISBNs with a number e.g.: 081738751X
            $img_src = get_sub_field('isbn');
            if ( is_numeric($img_src) ) {
              $img_src = 'https://syndetics.com/index.php?isbn='.$img_src.'/MC.GIF&client=ryera&oclc=0&type=hw7';
            }
            $img_link = get_sub_field('link'); 
            $img_title = get_sub_field('title');
          ?>
          <li><a href="<?php echo $img_link; ?>"><img src="<?php echo $img_src; ?>" alt="<?php echo $img_title; ?>" height="150" ga-on="click" ga-event-category="Featured Titles Slider" ga-event-action="click" ga-event-label="<?php echo $img_title; ?>"></a></li>
        <?php endwhile; ?>
      </ul>

      <a class="jcarousel-control-prev" href="#" ga-on="click" ga-event-category="Featured Titles Slider" ga-event-action="controls" ga-event-label="previous"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
      <a class="jcarousel-control-next" href="#" ga-on="click" ga-event-category="Featured Titles Slider" ga-event-action="controls" ga-event-label="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
    </div>
  </div>
  
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('.featured-titles .jcarousel').jcarousel({
        wrap: "circular"
      }).jcarouselAutoscroll({
        interval: 2500,
        autostart: true
      });
      jQuery('.featured-titles .jcarousel-control-prev').jcarouselControl({
        target: "-=1"
      });
      jQuery('.featured-titles .jcarousel-control-next').jcarouselControl({
        target: "+=1"
      });
    });
  </script>
<?php endif; ?>
