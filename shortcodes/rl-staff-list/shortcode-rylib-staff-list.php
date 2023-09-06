<?php

$attributes = get_query_var('attributes');


$args = [
    'post_type' => 'team-member',
    'posts_per_page' => 0
];

if(isset($attributes['department'])){
    $args['meta_key'] = 'department';
    $args['meta_value'] = $attributes['department'];
}

$query = new WP_Query($args);

?>

<?php if($query->have_posts()):?>

<?php while ($query -> have_posts()) : $query->the_post();?>
    
    <div class="staff-member-listing">
        <div class="container">
            <div class="staff-member-info-wrap">
                <h4 class="staff-member-name"><?php the_field('name'); ?></h4>
                <h6 class="staff-member-position" style="font-style:italic"><?php the_field('position') ?>, <?php the_field('department') ?></h6>
                <p class="staff-member-contact-info"><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a> | <?php the_field('phone-number') ?></p>
            </div>
        </div>
    </div>

<?php endwhile ?>

<?php endif; ?>