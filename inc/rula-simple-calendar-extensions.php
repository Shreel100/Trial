<?php 
/**
 * Simple Calendar Extensions
 */

/**
 * Get feed IDs and names from a grouped calendar.
 *
 * @param  string|Calendar $calendar
 *
 * @return array Associative array with ids as keys and feed titles as values.
 */
function rula_wordpress_get_grouped_calendars_names( $calendar ) {
  $calendars_ids = $calendar->calendars_ids;

  $posts = get_posts( array(
    'post_type' => 'calendar',
    'include' => $calendars_ids,
    'nopaging' => true
  ) );

  $feed_names = array();
  foreach ( $posts as $post ) {
    $feed_names[ $post->ID ] = $post->post_title;
  }
  asort( $feed_names );

  return $feed_names;
}

function rula_wordpress_simcal_grouped_calendars_filter( $calendar_id ) {
  $calendar = simcal_get_feed( $calendar_id );

  if ( $calendar->type === 'grouped-calendars' ) {
    $feed_names = rula_wordpress_get_grouped_calendars_names( $calendar );

    $html = '<div class="rula-simcal-filter">';
    foreach ($feed_names as $key => $name) {
      $html .= '<div class="btn btn-primary simcal-filter" data-filter-event="' . $key . '">' . $name . '</div>';
    }
    $html .= '</div>';

    echo $html;
  }

}

add_action('simcal_calendar_html_before', 'rula_wordpress_simcal_grouped_calendars_filter');