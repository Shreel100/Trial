<?php
/**
 * Ryerson University Library & Archives theme function and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package WordPressshort
 * @subpackage RULA
 * @since RULA 0.1
 */

define("THEME_VERSION", "2.5.8");

if( !function_exists('is_plugin_active') ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

// Include Helpers
include_once( get_template_directory() . '/inc/helpers.php');
include_once( get_template_directory() . '/inc/flex-block-helpers.php');

// Include Shortcodes
include_once( get_template_directory() . '/shortcodes/rylib-shortcodes.php');

// Include Simple Calendar Plugin customizations
include_once( get_template_directory() . '/inc/rula-simple-calendar-extensions.php');

// Include ACF options and customizations
include_once( get_template_directory() . '/inc/acf-options.php');

// Include eResources feature for main site
if ( is_main_site() ) {
  include_once( get_template_directory() . '/inc/eresources/eresources.php');
}

// Include customizations to the Block Editor
include_once( get_template_directory() . '/inc/rylib-wp-block-editor/rylib-wp-block-editor.php');

/**
 * Register custom Bootstrap navigation walker
 * Thanks to Edward McIntyre for: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * @since RULA 1.13.x
 */
require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';

/**
 * Include our customized RSS Widget (based off the default WordPress RSS 
 * Widget).
 */
include_once( get_template_directory() . '/inc/rylib-widget-rss.php');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rylib_wp_after_setup_theme() {
  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  // Set content-width.
  global $content_width;
  if ( ! isset( $content_width ) ) {
    $content_width = 1140;
  }
  
  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' ); 
  
  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
  add_theme_support( 'title-tag' );
  
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
  );
  
  // Enable Gallery, Quote, and Image post formats
  add_theme_support( 'post-formats', array( 'gallery', 'quote', 'image' ) ); 
  
  // Add support for excerpts on pages
  add_post_type_support( 'page', 'excerpt' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on this theme, use a find and replace
	 * to change 'rylib_wp' to the name of your theme in all the template files.
	 */
  load_theme_textdomain( 'rylib_wp' );

  // Register menu locations
  register_nav_menu( 'global-header-top-menu', 'Global Header Top Menu', 'rylib_wp');
  register_nav_menu( 'global-header-menu', 'Global Header Bottom Menu', 'rylib_wp');
  register_nav_menu( 'local-header-menu', 'Local Header Menu', 'rylib_wp' );
  register_nav_menu( 'local-footer-menu', 'Local Footer Menu', 'rylib_wp');
  register_nav_menu( 'primary', __( 'Primary Navigation Menu', 'rylib_wp' ) );
  register_nav_menu( 'footer', __( 'Footer Navigation Menu', 'rylib_wp' ) ); 
}
add_action( 'after_setup_theme', 'rylib_wp_after_setup_theme' );

/**
 * Modify allowed HTML tags and attributes in posts
 * @since RULA 1.6.x
 */
function rylib_wp_allowed_tags() {
  global $allowedposttags, $allowedtags;

  $allowedtags['a']['data-ga-event'] = array();
  $allowedposttags['a']['data-ga-event'] = array();

  $iframe_atts = array(
    "src" => array(),
    "height" => array(),
    "width" => array(),
    "style" => array()
  );
  $allowedtags["iframe"] = $iframe_atts;
  $allowedposttags["iframe"] = $iframe_atts;
  
  $allowedtags['form']['data-ga-event-category'] = array();
  $allowedtags['form']['data-ga-event-action'] = array();
  $allowedtags['form']['data-ga-event-label'] = array();
  $allowedtags['form']['data-ga-event-value'] = array();
  
  $allowedposttags['form']['data-ga-event-category'] = array();
  $allowedposttags['form']['data-ga-event-action'] = array();
  $allowedposttags['form']['data-ga-event-label'] = array();
  $allowedposttags['form']['data-ga-event-value'] = array();
}
add_action( 'init', 'rylib_wp_allowed_tags' );
add_filter('tiny_mce_before_init', function( $a ) {
  $a["extended_valid_elements"] = 'iframe[src|height|width|style]';
  return $a;
});

/**
 * Register our sidebars and widgetized areas. Modified to add separate blog, pages, front page widget areas.
 *
 * @since RULA 0.5
 */
function rylib_wp_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Pages Sidebar', 'rylib_wp' ),
    'id' => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // TODO: remove sidebar-2 after ensuring all sites do not use the "Frontpage Sidebar" anymore ("Frontpage Sidebar")
  register_sidebar( array(
    'name' => __( 'Frontpage Sidebar', 'rylib_wp' ),
    'id' => 'sidebar-2',
    'description' => __( 'The sidebar for the Frontpage Template', 'rylib_wp' ),
    'before_widget' => '<aside id="%1$s" class="col-sm-6 col-md-12 widget %2$s" style="clear: none;">',
    'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'Blog Sidebar', 'rylib_wp' ),
    'id' => 'sidebar-6',
    'description' => __( 'An optional widget area for your site blog', 'rylib_wp' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'rylib_wp_widgets_init' );

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
// TODO: Determine if we still need rylib_wp_excerpt_length. If not, remove this.
function rylib_wp_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'rylib_wp_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function rylib_wp_continue_reading_link() {
  return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and rylib_wp_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function rylib_wp_auto_excerpt_more( $more ) {
  return ' &hellip;' . rylib_wp_continue_reading_link();
}
add_filter( 'excerpt_more', 'rylib_wp_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function rylib_wp_get_the_excerpt( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= rylib_wp_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'rylib_wp_get_the_excerpt' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function rylib_wp_nav_menu_fallback( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'rylib_wp_nav_menu_fallback' );

// TODO: remove this in favor of the way that the Twenty Twenty theme implements comments
if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li class="post pingback">
    <p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <footer class="comment-meta">
        <div class="comment-author vcard">
          <?php
            $avatar_size = 68;
            if ( '0' != $comment->comment_parent )
              $avatar_size = 39;

            echo get_avatar( $comment, $avatar_size );

            /* translators: 1: comment author, 2: date and time */
            printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
              sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
              sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
                esc_url( get_comment_link( $comment->comment_ID ) ),
                get_comment_time( 'c' ),
                /* translators: 1: date, 2: time */
                sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
              )
            );
          ?>

          <?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .comment-author .vcard -->

        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
          <br />
        <?php endif; ?>

      </footer>

      <div class="comment-content"><?php comment_text(); ?></div>

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </article><!-- #comment-## -->

  <?php
      break;
  endswitch;
}
endif; // ends check for twentyeleven_comment()

/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own rylib_wp_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
if ( ! function_exists( 'rylib_wp_posted_on' ) ) {
  function rylib_wp_posted_on() {
    printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
      esc_url( get_permalink() ),
      esc_attr( get_the_time() ),
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
      get_the_author()
    );
  }
}

/**
 * Modifies comments form fields to remove URL/Website and add placeholders for other form fields.
 * @since RULA 0.6
 */
function rylib_wp_comment_form_defaults($new_defaults) { 
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' ); 
  $new_fields = array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" placeholder="Your name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" placeholder="your.email@ryerson.ca" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>'
    );

  $new_defaults['fields'] = apply_filters('comment_form_default_fields', $new_fields); 
  $new_defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment" class="sr-only">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" placeholder="Enter your comment here" cols="45" rows="4" aria-required="true"></textarea></p>';
  $new_defaults['title_reply'] = 'Leave a Comment';
  return $new_defaults;
}
add_filter('comment_form_defaults', 'rylib_wp_comment_form_defaults'); 

/**
 * Register scripts and styles to be loaded by the rula_wordpress theme later
 * @since RULA 1.6.0
 */
function rylib_wp_register_scripts() {
  // bootstrap
  wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap-3.3.7/css/bootstrap.min.css', array(), '3.3.7' );
  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );

  // Font Awesome
  // wp_register_style( 'font-awesome-style', get_template_directory_uri() . '/vendor/font-awesome-4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
  wp_register_style( 'fontawesome-free-web', get_template_directory_uri() . '/vendor/fontawesome-free-6.1.1-web/css/all.min.css', array(), '6.1.1' );
  wp_register_style( 'fontawesome-v4-shims', get_template_directory_uri() . '/vendor/fontawesome-free-6.1.1-web/css/v4-shims.css', array(), '6.1.1' );

  // RULA Scripts
  wp_register_script( 'ryerson-components-js', get_template_directory_uri() . '/js/ryerson-components.js', array(), THEME_VERSION, true );
  wp_register_script( 'rula-script-js', get_template_directory_uri() . '/js/script.js', array(), THEME_VERSION, true );
  wp_register_script( 'rula-frontpage-tabs-js', get_template_directory_uri().'/js/search_tabs.js', array('jquery'), THEME_VERSION, true );
  wp_register_script( 'rula-wordpress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), THEME_VERSION, true );

  // RULA Styles
  wp_register_style( 'web-styles', get_stylesheet_uri(), array(), THEME_VERSION );
  wp_register_style( 'rylib-common', get_template_directory_uri().'/css/rylib-common.css', array(), THEME_VERSION );
  wp_register_style( 'rula-wordpress-style', get_template_directory_uri().'/css/rula-style.css', array(), THEME_VERSION );
  wp_register_style( 'rula-ribbons-style', get_template_directory_uri().'/css/ribbons.css', array(), THEME_VERSION );
  // TODO: remove feed2js in favor of RSS feed widgets
  wp_register_style( 'rula-feed2js-style', get_template_directory_uri().'/css/feed2js.css', array(), THEME_VERSION );
  wp_register_style( 'rula-flex-blocks-style', get_template_directory_uri().'/css/flex-blocks.css', array(), THEME_VERSION );

  // Subpages Navigation Widget Overrides
  wp_register_style( 'rula-subpages-navigation-style', get_template_directory_uri().'/css/rula-subpages-navigation.css', array(), THEME_VERSION );

  // jcarousel
  wp_register_style( 'jcarousel-style', get_template_directory_uri().'/css/jcarousel.css', array(), '0.3.5' );
  wp_register_script( 'jcarousel-js' , get_template_directory_uri().'/vendor/jcarousel-0.3.5/jquery.jcarousel.min.js', array('jquery'), '0.3.5', true );
  wp_register_script( 'jcarousel-autoscroll' , get_template_directory_uri().'/vendor/jcarousel-0.3.5/jquery.jcarousel-autoscroll.min.js', array('jcarousel-js'), '0.3.5', true );
  wp_register_script( 'jcarousel-control' , get_template_directory_uri().'/vendor/jcarousel-0.3.5/jquery.jcarousel-control.min.js', array('jcarousel-js'), '0.3.5', true );
  wp_register_script( 'jcarousel-pagination' , get_template_directory_uri().'/vendor/jcarousel-0.3.5/jquery.jcarousel-pagination.min.js', array('jcarousel-js'), '0.3.5', true );

  // autotrack.js - See: https://github.com/googleanalytics/autotrack
  wp_register_script( 'autotrack-js', get_template_directory_uri().'/vendor/autotrack-2.4.1/autotrack.js', array(), '2.4.1', true);
}
add_action('wp_enqueue_scripts', 'rylib_wp_register_scripts');

/**
 * Register scripts and styles to be loaded by the rula_wordpress theme later
 * @since RULA 1.6.0
 */
function rylib_wp_enqueue_scripts() {
  // Font Awesome
  // wp_enqueue_style('font-awesome-style');
  wp_enqueue_style('fontawesome-free-web');
  wp_enqueue_style('fontawesome-v4-shims');

  // Enqueue bootstrap styles
  wp_enqueue_script('bootstrap-js');
  wp_enqueue_style('bootstrap-style');

  // RULA Scripts
  wp_enqueue_script('ryerson-components-js');
  wp_enqueue_script('rula-script-js');
  wp_enqueue_script('rula-frontpage-tabs-js');

  // RULA Styles
  wp_enqueue_style('web-styles');
  wp_enqueue_style('rylib-common');
  wp_enqueue_style('rula-wordpress-style');
  wp_enqueue_style('rula-ribbons-style');
  // TODO: remove feed2js in favor of RSS feed widgets
  wp_enqueue_style('rula-feed2js-style');
  wp_enqueue_style('rula-flex-blocks-style');

  // Subpages Navigation Widget Overrides
  wp_enqueue_style('rula-subpages-navigation-style');

  // jCarousel
  wp_enqueue_script('jcarousel-js');
  wp_enqueue_script('jcarousel-autoscroll');
  wp_enqueue_script('jcarousel-control');
  wp_enqueue_style('jcarousel-style');

  // autotrack.js - See: https://github.com/googleanalytics/autotrack
  wp_enqueue_script('autotrack-js');
}
add_action('wp_enqueue_scripts', 'rylib_wp_enqueue_scripts');

/**
 * Adds autotrack.js event attributes to menu areas
 * @since RULA 1.6.x
 */
function rylib_wp_nav_menu_link_attributes( $atts, $item, $args ) {
  if ( $args->theme_location == 'global-header-menu' || $args->theme_location == 'global-header-top-menu' ) {
    $atts['ga-on'] = 'click';
    $atts['ga-event-category'] = 'Navigation';
    $atts['ga-event-action'] = 'Header click';
    $atts['ga-event-label'] = $item->title;
  }

  if ( $args->theme_location == 'local-footer-menu' ) {
    $atts['ga-on'] = 'click';
    $atts['ga-event-category'] = 'Navigation';
    $atts['ga-event-action'] = 'Footer click';
    $atts['ga-event-label'] = $item->title;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rylib_wp_nav_menu_link_attributes', 10, 3 );

// Enables Appearance -> Customize -> "Additional CSS" for normal site admins
function rylib_wp_css_map_meta_cap( $caps, $cap ) {
  if ( 'edit_css' === $cap && is_multisite() ) {
    $caps = array( 'edit_theme_options' );
  }
  return $caps;
}
add_filter( 'map_meta_cap', 'rylib_wp_css_map_meta_cap', 20, 2 );

/**
 * Show draft and private pages in Page Attributes > Page Parent dropdown
 * will work for any hier. post type.
 */
function filter_attributes_dropdown_pages_args($dropdown_args) {
  $dropdown_args['post_status'] = array('publish','draft', 'private');
  return $dropdown_args;
}
add_filter( 'page_attributes_dropdown_pages_args', 'filter_attributes_dropdown_pages_args', 100, 1);
add_filter( 'quick_edit_dropdown_pages_args', 'filter_attributes_dropdown_pages_args', 100, 1);

// TODO: Remove the nivoslider stuff
/**
 * Creates shortcode for Nivo Slider plugin
 * @since RULA 0.5
 */
function nivoslider_func( $atts ){
  if (function_exists('nivoslider4wp_show')) { nivoslider4wp_show(); }
 }
 add_shortcode( 'nivoslider', 'nivoslider_func' );
 

// TODO: Remove ninja_forms... we don't really use it anymore
// Must use all three filters for this to work properly. 
add_filter( 'ninja_forms_admin_parent_menu_capabilities',   'nf_subs_capabilities' ); // Parent Menu
add_filter( 'ninja_forms_admin_all_forms_capabilities',     'nf_subs_capabilities' ); // Forms Submenu
add_filter( 'ninja_forms_admin_submissions_capabilities',   'nf_subs_capabilities' ); // Submissions Submenu
function nf_subs_capabilities( $cap ) {
  return 'edit_posts'; // EDIT: User Capability
}

function rylib_stafflist_shortcode($atts){

  set_query_var('attributes', $atts);

  ob_start(); // Start output buffering
  get_template_part('shortcodes/rl-staff-list/shortcode', 'rylib-staff-list');
  return ob_get_clean(); // Capture and return the buffered content
}
add_shortcode('rylib-staff-list', 'rylib_stafflist_shortcode');
