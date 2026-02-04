<?php
/**
 * Theme Customizer
 *
 * @package Alumni_IUT_Laval
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function alumni_iut_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.header__logo',
            'render_callback' => 'alumni_iut_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'alumni_iut_customize_partial_blogdescription',
        ));
    }

    // Add theme options section
    $wp_customize->add_section('alumni_iut_options', array(
        'title'    => __('Options du thème', 'alumni-iut-laval'),
        'priority' => 30,
    ));

    // Add footer text setting
    $wp_customize->add_setting('alumni_iut_footer_text', array(
        'default'           => __('Alumni IUT Laval - Tous droits réservés', 'alumni-iut-laval'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('alumni_iut_footer_text', array(
        'label'    => __('Texte du footer', 'alumni-iut-laval'),
        'section'  => 'alumni_iut_options',
        'type'     => 'text',
    ));

    // Add social media settings
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'linkedin'  => 'LinkedIn',
        'instagram' => 'Instagram',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('alumni_iut_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('alumni_iut_social_' . $network, array(
            'label'    => sprintf(__('URL %s', 'alumni-iut-laval'), $label),
            'section'  => 'alumni_iut_options',
            'type'     => 'url',
        ));
    }
}
add_action('customize_register', 'alumni_iut_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function alumni_iut_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function alumni_iut_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alumni_iut_customize_preview_js() {
    wp_enqueue_script('alumni-iut-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'alumni_iut_customize_preview_js');
