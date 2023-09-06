<?php if ( have_rows('hero_banner') ) : ?>
  <?php while( have_rows('hero_banner') ): the_row(); ?>
    <?php if ( !empty(get_sub_field('hero_banner_image')) ) : ?>
      <style>
        .rylib-hero-banner {
          background: url(<?php the_sub_field('hero_banner_image'); ?>);
          background-size: cover;
          background-position: center;
          padding: 8em 0;
          margin-bottom: 1em;
          text-align: center;
        }
      </style>
      <div class="rylib-hero-banner">
        <div class="container">
          <div class="col-xs-12">
            <div class="row">
              <?php $hero_banner_content = get_sub_field('hero_banner_content'); ?>
              <div><?php echo do_shortcode($hero_banner_content); ?></div>
            </div>
            <?php if ( have_rows('hero_cta_buttons') ) : ?>
              <style>
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
              <div class="row">
                <div style="display: flex">
                  <?php while( have_rows('hero_cta_buttons') ): the_row(); ?>
                    <div class="cta-widget">
                      <a href="<?php the_sub_field('button_url') ?>" class="ryerson-btn" class="ryerson-btn" ga-on="click" ga-event-category="Call To Action" ga-event-action="Widget click" ga-event-label="<?php the_sub_field('button_text') ?>">
                        <?php if ( !empty(get_sub_field('button_icon')) ) : ?>
                          <img style="height: 31px; margin-right: 0.5em;" src="<?php the_sub_field('button_icon') ?>"/>
                        <?php endif; ?>
                        <?php the_sub_field('button_text') ?>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if ( !empty(get_sub_field('hero_banner_image_tagline')) ) : ?>
        <div class="container" style="margin-top: 100px; margin-bottom: -100px;">
          <p style="color: white; text-align: left;"><?php the_sub_field('hero_banner_image_tagline') ?></p>
        </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>