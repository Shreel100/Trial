<?php

get_header(); ?>

<div class="staff-member-listing">
    <div class="container">
        <div class="staff-list" style="background: white; padding:25px; width: 750px; margin-top: 25px; margin-bottom: 11px">
            <?php if(have_rows('team')):?>
                <?php while(have_rows('team')): the_row();?>
                    <li style="list-style: none; margin-bottom: 15px; background:#EBEBEB; padding:10px">
                        <h4 style="margin-top:5px; margin-bottom: 0px"><?php the_field('name');?></h4>
                        <h5 style="font-style: italic; margin:0px"><?php the_field('position');?></h5>
                        <a href="mailto:<?php the_field('email');?>"><?php the_field('email');?></a>
                        <?php the_field('phone-number');?>
                    </li>
                <?php endwhile; ?>
            <?php endif ?>
        </div>
    </div>
</div>

<?php get_footer();?>