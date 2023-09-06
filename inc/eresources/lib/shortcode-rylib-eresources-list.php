<?php
add_shortcode('rylib_eresources_list', 'rylib_eresources_list_shortcode');
function rylib_eresources_list_shortcode($atts = []) {
  // only enqueue styles if the shortcode is used!
  wp_enqueue_style( 'rylib-eresources' ); 

  $content = '';

  $eresources_query = new WP_Query(
    array(
      'post_type' => 'eresources', 
      'post_parent' => 0, 
      'posts_per_page' => -1, 
      'order' => 'ASC', 
      'orderby' => 'title',
    )
  );

  if ( $eresources_query->have_posts() ) {
    $i = 0;
    $content .= '<div class="rylib-eresources-list-wrap"><ul class="rylib-eresources-list">';
    while ( $eresources_query->have_posts() ) : $eresources_query->the_post();
      $i++;
      $content .= sprintf(
        '<li><a href="%s">%s</a></li>',
        get_the_permalink(), 
        get_the_title()
      );
      if ( ( $eresources_query->current_post + 1 ) == ceil($eresources_query->post_count / 2) ) {
        $content .= '</ul><ul class="rylib-eresources-list">';
      }
    endwhile;
    $content .= '</ul></div>';
  }
  
  wp_reset_query();

  return $content;
}