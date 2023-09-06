<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.5
 */

/* 
  WARNING: This theme is intended to be used in conjunction with the GitHub 
  Updater plugin (https://github.com/afragen/github-updater). Changes made to 
  files in this theme directly in the WordPress theme editor will be overwritten 
  during automatic updates.
*/
get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '404&#58; Page Not Found', 'twentyeleven' ); ?></h1>
				</header>

				<div class="entry-content">
					<p>Sorry we could not find your page. Please use the search box below to find the page you were looking for. Apologies for any inconvenience.</p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>