<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.1
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label if
 * one was passed to get_search_form() in the args array.
 */
$unique_id = wp_unique_id( 'search-form-' );

$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';

$ga_event_attributes = 'data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Site search" data-ga-event-label="Search WordPress"';

if ( is_main_site() ) {
	$site_search_label = 'Search library.torontomu.ca';
} else {
	$site_search_label = 'Search this website';
} 
?>

<div class="rylib-search-form rylib-search-form-white">
	<form role="search" <?php echo $aria_label; ?> method="get" class="form-track-submits" action="<?php echo home_url('/'); ?>" <?php echo $ga_event_attributes; ?>>
		<label for="<?php echo esc_attr( $unique_id ); ?>" class="sr-only"><?php echo $site_search_label ?></label>
		<input id="<?php echo esc_attr( $unique_id ); ?>" type="text" name="s" placeholder="<?php echo $site_search_label ?>">
		<button aria-label="Search" type="submit"><i class="fa fa-search" title="Search"></i></button>
	</form>
</div>