<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.1
 */

/* 
  WARNING: This theme is intended to be used in conjunction with the GitHub 
  Updater plugin (https://github.com/afragen/github-updater). Changes made to 
  files in this theme directly in the WordPress theme editor will be overwritten 
  during automatic updates.
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( 'post' == get_post_type() || is_search() ) : ?>
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->
	<?php elseif ( !is_main_site() ) : ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rylib_wp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_search() ) {
			the_excerpt(); 
		} else {
			the_content();
		} ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>

		<footer class="entry-meta">
			<?php
			 	if ( 'post' == get_post_type() ) {
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
					if ( '' != $tag_list ) {
						$utility_text = __( '<span>This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'twentyeleven' );
					} elseif ( '' != $categories_list ) {
						$utility_text = __( '<span>This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'twentyeleven' );
					} else {
						$utility_text = __( '<span>This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'twentyeleven' );
					}

					printf(
						$utility_text,
						$categories_list,
						$tag_list,
						esc_url( get_permalink() ),
						the_title_attribute( 'echo=0' ),
						get_the_author(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
					);
				}
			?>
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
