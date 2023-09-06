<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 * @subpackage RULA
 * @since RULA 1.27.x
 */

/** WARNING
 * This theme is intended to be used in conjunction with the GitHub Updater
 * plugin (https://github.com/afragen/github-updater). Changes made to files
 * in this theme directly in the WordPress theme editor will be overwritten
 * during automatic updates.
 */

get_header(); ?>

<?php
$archive_title    = '';
$archive_subtitle = '';
$search_result_text = '';

if ( is_search() ) {
	global $wp_query;

	$archive_title = sprintf(
		'%1$s %2$s',
		'<span class="color-accent">' . __( 'Search:', 'rula_wordpress' ) . '</span>',
		'&ldquo;' . get_search_query() . '&rdquo;'
	);

	if ( $wp_query->found_posts ) {
		$archive_subtitle = sprintf(
			/* translators: %s: Number of search results */
			_n(
				'We found %s result for your search.',
				'We found %s results for your search.',
				$wp_query->found_posts,
				'rula_wordpress'
			),
			number_format_i18n( $wp_query->found_posts )
		);
	} else {
		$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'rula_wordpress' );
	}
} elseif ( ! is_home() ) {
	$archive_title    = get_the_archive_title();
	$archive_subtitle = get_the_archive_description();
} elseif ( is_home() ) {
	$archive_title = 'News';
}
?>

<?php // TODO: we need to come up with better page header logic. ?>
<?php if ( is_main_site() && ($archive_title || $archive_subtitle) ) { ?>

<header class="rula-page-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>
					<?php echo wp_kses_post( $archive_title ); ?>
				</h1>
      </div>
    </div>
  </div>
</header>

<?php } ?>

<div class="container" style="margin-top: 1em;">

	<div class="row">

		<div id="primary" class="col-xs-12 col-md-9">
			<?php rylib_wp_breadcrumbs(); ?>

			<?php if ( $archive_subtitle ) { ?>
				<?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?>
			<?php } ?>

			<?php if ( have_posts() ) {

				$i = 0;

				while ( have_posts() ) {
					$i++;
					if ( $i > 1 ) {
						echo '<hr class="post-separator" aria-hidden="true" />';
					}
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				}
			} elseif ( is_search() ) {
				?>

				<div class="no-search-results-form section-inner thin">

					<?php
					get_search_form(
						array(
							'label' => __( 'search again', 'twentytwenty' ),
						)
					);
					?>

				</div><!-- .no-search-results -->

				<?php
			}
			?>

			<?php get_template_part( 'template-parts/pagination' ); ?>

		</div><!-- .primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- .row -->

</div><!-- .container -->

<?php get_footer(); ?>