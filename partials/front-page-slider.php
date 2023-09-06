<?php if ( get_field('display_front_page_slider' ) ) : ?>

  <?php $slider_display_width = get_field('slider_display_width'); ?>

  <?php if ( get_field('slider_content_source') == 'blog' ): ?>

    <?php
      $args = array(
        'numberposts' => 3,
        'offset' => 0,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' =>'',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
      );

      $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
    ?>

    <?php if ( count($recent_posts) > 0 ): ?>
      
      <?php if ( $slider_display_width == 'content' ) : ?>
        <div class="container" style="margin-top: 1rem;"><div class="row"><div class="col-xs-12">
      <?php endif ?>

      <div id="front-page-carousel" class="carousel slide" data-ride="carousel">

        <?php if ( count($recent_posts) > 1 ): ?>
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php for ($i=0; $i < count($recent_posts); $i++) : ?>
              <li data-target="#front-page-carousel" data-slide-to="<?php echo $i ?>"<?php if ($i == 0) : ?> class="active"<?php endif; ?>></li>
            <?php endfor; ?>
          </ol>
        <?php endif ?>

        <div class="carousel-inner" role="listbox">
          <?php foreach ($recent_posts as $recent) : ?>
            <div class="item">
              <?php echo get_the_post_thumbnail($recent["ID"], 'full') ?>
              <div class="carousel-caption <?php echo $caption_classes ?>">
                <h3><a href="<?php echo get_permalink($recent["ID"]) ?>" ga-on="click" ga-event-category="Homepage Slider" ga-on-event-action="click" ga-event-label="<?php echo $recent['post_title'] ?>"><?php echo $recent["post_title"]; ?></a></h3>
              </div>            
            </div>
          <?php endforeach ?>
        </div>

        <?php if ( count($recent_posts) > 1 ): ?>
          <!-- Controls -->
          <a class="left carousel-control hidden-xs" href="#front-page-carousel" role="button" data-slide="prev" ga-on="click" ga-event-category="Homepage Slider" ga-event-action="controls" ga-event-label="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control hidden-xs" href="#front-page-carousel" role="button" data-slide="next" ga-on="click" ga-event-category="Homepage Slider" ga-event-action="controls" ga-event-label="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        <?php endif ?>

      </div>

      <?php if ( $slider_display_width == 'content' ): ?>
        </div></div></div>
      <?php endif ?>

    <?php endif ?>


    <?php wp_reset_query(); ?>

  <?php elseif ( get_field('slider_content_source') == 'manual'): ?>

    <?php if ( $rows = get_field('slider_content') ) : ?>

      <?php if ( $slider_display_width == 'content' ) : ?>
        <div class="container"><div class="row"><div class="col-xs-12">
      <?php endif ?>

      <div id="front-page-carousel" class="carousel slide" data-ride="carousel">
        <?php if ( count($rows) > 1 ): ?>
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php for ($i=0; $i < count($rows); $i++) : ?>
              <li data-target="#front-page-carousel" data-slide-to="<?php echo $i ?>"<?php if ($i == 0) : ?> class="active"<?php endif; ?>></li>
            <?php endfor; ?>
          </ol>
        <?php endif ?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php while( have_rows('slider_content') ): the_row(); ?>
            <?php 
              $image = get_sub_field('image');
              $image_alt_text = get_sub_field('image_alt_text');
              $caption_heading = get_sub_field('caption_heading');
              $caption_heading_link = get_sub_field('caption_heading_link');
              $caption_subtext = get_sub_field('caption_subtext');
              $show_caption_button = get_sub_field('show_caption_button');
              $caption_button_link = get_sub_field('caption_button_link');
            ?>
            <div class="item">
              <img src="<?php echo $image ?>" alt="<?php echo $image_alt_text ?>">

              <?php if ( !empty( $caption_heading ) ) : ?>
              <?php $caption_classes = $show_caption_button ? 'with-button' : ''; ?>
              <div class="carousel-caption <?php echo $caption_classes ?>">
                <?php if ( !empty( $caption_heading_link ) ) : ?>
                  <h3><a href="<?php echo $caption_heading_link ?>" ga-on="click" ga-event-category="Homepage Slider" ga-on-event-action="click" ga-event-label="<?php echo $caption_heading ?>"><?php echo $caption_heading ?></a></h3>
                <?php else : ?>
                  <h3><?php echo $caption_heading ?></h3>
                <?php endif ?>

                <?php if ( !empty( $caption_subtext ) ) : ?>
                  <p class="hidden-xs hidden-sm"><?php echo $caption_subtext ?></p>
                <?php endif ?>

                <?php if ( $show_caption_button ): ?>
                  <?php $caption_button_link = empty( $caption_button_link ) ? $main_text_link : $caption_button_link ?>
                  <a href="<?php echo $caption_button_link ?>" class="btn btn-default hidden-xs">Find out more</a>
                <?php endif ?>
              </div>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>

        </div>

        <?php if ( count($rows) > 1 ): ?>
          <!-- Controls -->
          <a class="left carousel-control hidden-xs" href="#front-page-carousel" role="button" data-slide="prev" ga-on="click" ga-event-category="Homepage Slider" ga-event-action="controls" ga-event-label="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control hidden-xs" href="#front-page-carousel" role="button" data-slide="next" ga-on="click" ga-event-category="Homepage Slider" ga-event-action="controls" ga-event-label="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        <?php endif ?>
      </div>


      <?php if ( $slider_display_width == 'content' ): ?>
        </div></div></div>
      <?php endif ?>

    <?php endif; ?>

  <?php endif ?>

<?php endif ?>
