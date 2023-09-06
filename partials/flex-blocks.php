<?php if ( have_rows('content_rows') ) : ?>
  
  <?php while ( have_rows('content_rows') ) : the_row(); ?>

    <div class="row">

    <?php if ( have_rows('flexible_content') ) : ?>

      <?php while ( have_rows('flexible_content') ) : the_row(); ?>

        <?php
          $classes = "";
          $classes .= flex_block_columns(get_sub_field('xs_width'), get_sub_field('sm_width'), get_sub_field('md_width'), get_sub_field('lg_width'));
          $classes .= " " . get_sub_field('classes');
        ?>

        <div class="<?php echo $classes; ?>">
        <?php if ( get_row_layout() == 'plain_content' ) : ?>
          <div class="rula-flex-plaincontent">
            <?php the_sub_field('content') ?>
          </div>
        <?php elseif ( get_row_layout() == 'imagetext' ) : ?>
          <?php 
            $imagetext_classes = array();
            $imagetext_classes[] = "rula-flex-imagetext";
            $imagetext_classes[] = get_sub_field('heading_bg');
          ?>
          <div class="<?php echo implode(' ', $imagetext_classes) ?>">
            <?php $heading_link = get_sub_field('heading_link') ?>
            <?php if ( !empty($heading_link) ) : ?>
              <a href="<?php the_sub_field('heading_link') ?>">
                <img src="<?php the_sub_field('image') ?>">
              </a>
              <h3><a href="<?php the_sub_field('heading_link') ?>"><?php the_sub_field('heading') ?></h3></a>
            <?php else : ?>
              <img src="<?php the_sub_field('image') ?>">
              <h3><?php the_sub_field('heading') ?></h3>
            <?php endif ?>
            <p><?php the_sub_field('content') ?></p>
          </div>
        <?php endif ?>
        </div>

      <?php endwhile; ?>

    <?php endif ?>

    </div>

  <?php endwhile; ?>

<?php endif ?>