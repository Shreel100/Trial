<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage RULA
 * @since RULA 0.1
 */

/** WARNING
 * This theme is intended to be used in conjunction with the GitHub Updater
 * plugin (https://github.com/afragen/github-updater). Changes made to files
 * in this theme directly in the WordPress theme editor will be overwritten
 * during automatic updates.
 */
?>

<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" class="lt-ie9 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <meta name="theme-color" content="#03599c">

  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico?v=<?php echo THEME_VERSION ?>"/>

  <?php get_template_part('partials/google-analytics'); ?>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-T7ZH6HZ');</script>
  <!-- End Google Tag Manager -->

  <!--[if IE 8]>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style-ie8.css" />
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv-printshiv.js"></script>
  <![endif]-->

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php
    /* We add some JavaScript to pages with the comment form to support sites 
     * with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head> tag of your theme, 
     * or you will break many plugins, which generally use this hook to add  
     * elements to <head> such as styles, scripts, and meta tags.
     */
    wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7ZH6HZ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <?php if ( is_main_site() ): ?>
  <a class="assistive-text btn" href="#main-navigation">Skip to main menu</a>
  <?php else: ?>
  <a class="assistive-text btn" href="#local-navigation">Skip to main menu</a>
  <?php endif ?>
  <a class="assistive-text btn" href="#main">Skip to content</a>

  <?php get_template_part('partials/alert-message'); ?>
  
  <?php get_template_part('partials/global-header'); ?>

  
  <?php if ( is_main_site() ): ?>
    <?php get_template_part('partials/page-header'); ?>
  <?php else: ?>
    <?php get_template_part('partials/local-header'); ?>
  <?php endif ?>

  <?php get_template_part('partials/cta-panel'); ?>

  <div id="main" class="clear">
  