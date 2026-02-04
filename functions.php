<?php
/**
 * Alumni IUT Laval Theme Functions
 *
 * @package Alumni_IUT_Laval
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function alumni_iut_setup() {
    // Make theme available for translation
    load_theme_textdomain('alumni-iut-laval', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);
    add_image_size('alumni-featured', 800, 450, true);
    add_image_size('alumni-thumbnail', 400, 300, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'alumni-iut-laval'),
        'footer'  => __('Menu Footer', 'alumni-iut-laval'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'alumni_iut_setup');

/**
 * Set the content width in pixels
 */
function alumni_iut_content_width() {
    $GLOBALS['content_width'] = apply_filters('alumni_iut_content_width', 1200);
}
add_action('after_setup_theme', 'alumni_iut_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function alumni_iut_scripts() {
    // Main stylesheet
    wp_enqueue_style('alumni-iut-style', get_stylesheet_uri(), array(), '1.0.0');

    // JavaScript files
    wp_enqueue_script('alumni-iut-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true);
    wp_enqueue_script('alumni-iut-newsletter', get_template_directory_uri() . '/assets/js/newsletter.js', array(), '1.0.0', true);
    wp_enqueue_script('alumni-iut-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'alumni_iut_scripts');

/**
 * Register widget areas
 */
function alumni_iut_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'alumni-iut-laval'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'alumni-iut-laval'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'alumni-iut-laval'),
        'id'            => 'footer-1',
        'description'   => __('Première colonne du footer', 'alumni-iut-laval'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'alumni-iut-laval'),
        'id'            => 'footer-2',
        'description'   => __('Deuxième colonne du footer', 'alumni-iut-laval'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'alumni-iut-laval'),
        'id'            => 'footer-3',
        'description'   => __('Troisième colonne du footer', 'alumni-iut-laval'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4', 'alumni-iut-laval'),
        'id'            => 'footer-4',
        'description'   => __('Quatrième colonne du footer', 'alumni-iut-laval'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'alumni_iut_widgets_init');

/**
 * Register custom taxonomies
 */
function alumni_iut_register_taxonomies() {
    // Register Département taxonomy
    register_taxonomy('departement', array('post'), array(
        'labels' => array(
            'name'              => __('Départements', 'alumni-iut-laval'),
            'singular_name'     => __('Département', 'alumni-iut-laval'),
            'search_items'      => __('Rechercher des départements', 'alumni-iut-laval'),
            'all_items'         => __('Tous les départements', 'alumni-iut-laval'),
            'edit_item'         => __('Modifier le département', 'alumni-iut-laval'),
            'update_item'       => __('Mettre à jour le département', 'alumni-iut-laval'),
            'add_new_item'      => __('Ajouter un nouveau département', 'alumni-iut-laval'),
            'new_item_name'     => __('Nouveau nom de département', 'alumni-iut-laval'),
            'menu_name'         => __('Départements', 'alumni-iut-laval'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'departement'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'alumni_iut_register_taxonomies');

/**
 * Add default département terms
 */
function alumni_iut_add_default_terms() {
    $departements = array(
        'tc'   => array('name' => 'TC', 'slug' => 'tc', 'description' => 'Techniques de Commercialisation'),
        'mmi'  => array('name' => 'MMI', 'slug' => 'mmi', 'description' => 'Métiers du Multimédia et de l\'Internet'),
        'info' => array('name' => 'INFO', 'slug' => 'info', 'description' => 'Informatique'),
        'gb'   => array('name' => 'GB', 'slug' => 'gb', 'description' => 'Génie Biologique'),
    );

    foreach ($departements as $dept) {
        if (!term_exists($dept['slug'], 'departement')) {
            wp_insert_term($dept['name'], 'departement', array(
                'slug'        => $dept['slug'],
                'description' => $dept['description'],
            ));
        }
    }
}
add_action('init', 'alumni_iut_add_default_terms');

/**
 * Custom excerpt length
 */
function alumni_iut_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'alumni_iut_excerpt_length');

/**
 * Custom excerpt more
 */
function alumni_iut_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'alumni_iut_excerpt_more');

/**
 * Add custom body classes
 */
function alumni_iut_body_classes($classes) {
    // Add class if sidebar is active
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Add class for different page templates
    if (is_front_page()) {
        $classes[] = 'home-page';
    }

    return $classes;
}
add_filter('body_class', 'alumni_iut_body_classes');

/**
 * Include custom template functions
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
