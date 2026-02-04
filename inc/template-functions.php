<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Alumni_IUT_Laval
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function alumni_iut_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'alumni_iut_pingback_header');

/**
 * Custom navigation menu classes
 */
function alumni_iut_nav_menu_css_class($classes, $item, $args, $depth) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $classes[] = 'header__nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'alumni_iut_nav_menu_css_class', 10, 4);

/**
 * Custom navigation menu link classes
 */
function alumni_iut_nav_menu_link_attributes($atts, $item, $args, $depth) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $atts['class'] = 'header__nav-link';
        
        if (in_array('current-menu-item', $item->classes) || in_array('current-page-ancestor', $item->classes)) {
            $atts['class'] .= ' header__nav-link--active';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'alumni_iut_nav_menu_link_attributes', 10, 4);

/**
 * Sanitize pagination arrows
 */
function alumni_iut_pagination_arrow($link) {
    $link = str_replace('&laquo;', '<span aria-hidden="true">&laquo;</span>', $link);
    $link = str_replace('&raquo;', '<span aria-hidden="true">&raquo;</span>', $link);
    return $link;
}
add_filter('previous_posts_link_attributes', 'alumni_iut_pagination_arrow');
add_filter('next_posts_link_attributes', 'alumni_iut_pagination_arrow');
