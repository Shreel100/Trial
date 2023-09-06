<?php 
function rl_page_hierarchy_register_scripts() {
  wp_register_style( 'rl-page-hierarchy-css', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.css', array(), THEME_VERSION );
  wp_register_script( 'rl-page-hierarchy-js', get_template_directory_uri().'/shortcodes/rl-page-hierarchy/shortcode-rl-page-hierarchy.js', array('jquery'), THEME_VERSION, true );
}
add_action('wp_enqueue_scripts', 'rl_page_hierarchy_register_scripts');

function rl_page_hierarchy_shortcode() {
  global $post;
  
  wp_enqueue_style('rl-page-hierarchy-css');
  wp_enqueue_script('rl-page-hierarchy-js');

  $ancestors = get_post_ancestors( $post->ID );
  $parent = ( ! empty( $ancestors ) ) ? array_pop( $ancestors ) : $post->ID;

  $parent_title = get_the_title($parent);
  $parent_permalink = get_permalink($parent);
  $title_li = "<a class=\"top-level-item\" href=\"{$parent_permalink}\">{$parent_title}</a>";

  $content = '<ul class="rl-page-hierarchy">';
  $wp_list_pages_args = [
    'child_of' => $parent,
    'echo' => false,
    'title_li' => $title_li,
    'sort_column' => 'menu_order',
    'walker' => new Rl_Walker_Page_Modified(),
  ];
  if( current_user_can('edit_others_pages') ) {
    $wp_list_pages_args['post_status'] = ['publish', 'private', 'draft'];
  }
  $content .= wp_list_pages($wp_list_pages_args);
  $content .= '</ul>';

  return $content;
}
add_shortcode('rl_page_hierarchy', 'rl_page_hierarchy_shortcode');

// Modify the default page walker to print a <button> before the <a> tag if the
// page has descendants
class Rl_Walker_Page_Modified extends Walker_Page {
  public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
    if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
        $t = "\t";
        $n = "\n";
    } else {
        $t = '';
        $n = '';
    }
    if ( $depth ) {
        $indent = str_repeat( $t, $depth );
    } else {
        $indent = '';
    }

    $show_expand_button = false;
    $expand_button_class = [];
    $css_class = array( 'page_item', 'page-item-' . $page->ID );

    if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
      $show_expand_button = true;
      $css_class[] = 'page_item_has_children';
    }

    if ( ! empty( $current_page ) ) {
      $_current_page = get_post( $current_page );
      if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
        $css_class[] = 'current_page_ancestor';
        $expand_button_class[] = 'expanded';
      }
      if ( $page->ID == $current_page ) {
        $css_class[] = 'current_page_item';
        $expand_button_class[] = 'expanded';
      } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
        $css_class[] = 'current_page_parent';
        $expand_button_class[] = 'expanded';
      }
    } elseif ( $page->ID == get_option( 'page_for_posts' ) ) {
      $css_class[] = 'current_page_parent';
      $expand_button_class[] = 'expanded';
    }

    /**
     * Filters the list of CSS classes to include with each page item in the list.
     *
     * @since 2.8.0
     *
     * @see wp_list_pages()
     *
     * @param string[] $css_class    An array of CSS classes to be applied to each list item.
     * @param WP_Post  $page         Page data object.
     * @param int      $depth        Depth of page, used for padding.
     * @param array    $args         An array of arguments.
     * @param int      $current_page ID of the current page.
     */
    $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
    $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

    if ( '' === $page->post_title ) {
        /* translators: %d: ID of a post. */
        $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
    }

    $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
    $args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

    $atts                 = array();
    $atts['href']         = get_permalink( $page->ID );
    $atts['aria-current'] = ( $page->ID == $current_page ) ? 'page' : '';

    $expand_button_classes = implode( ' ', $expand_button_class );
    $expand_button = $show_expand_button ? sprintf('<button class="%s"></button>', $expand_button_classes) : '';

    /**
     * Filters the HTML attributes applied to a page menu item's anchor element.
     *
     * @since 4.8.0
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $href         The href attribute.
     *     @type string $aria_current The aria-current attribute.
     * }
     * @param WP_Post $page         Page data object.
     * @param int     $depth        Depth of page, used for padding.
     * @param array   $args         An array of arguments.
     * @param int     $current_page ID of the current page.
     */
    $atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
            $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }
    }

    $output .= $indent . sprintf(
      '<li%s>%s<a%s>%s%s%s</a>',
      $css_classes,
      $expand_button,
      $attributes,
      $args['link_before'],
      /** This filter is documented in wp-includes/post-template.php */
      apply_filters( 'the_title', $page->post_title, $page->ID ),
      $args['link_after']
    );

    if ( ! empty( $args['show_date'] ) ) {
        if ( 'modified' == $args['show_date'] ) {
            $time = $page->post_modified;
        } else {
            $time = $page->post_date;
        }

        $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
        $output     .= ' ' . mysql2date( $date_format, $time );
    }
  }
}
