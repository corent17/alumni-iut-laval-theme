<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Aller au contenu principal', 'alumni-iut-laval'); ?></a>

    <header class="header">
        <div class="header__container">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
                <?php
            }
            ?>
            
            <nav class="header__nav" aria-label="<?php esc_attr_e('Navigation principale', 'alumni-iut-laval'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'header__nav-list',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>
            
            <a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn--primary header__cta">
                <?php esc_html_e('Se connecter', 'alumni-iut-laval'); ?>
            </a>
            
            <button class="header__mobile-toggle" aria-label="<?php esc_attr_e('Menu mobile', 'alumni-iut-laval'); ?>" aria-expanded="false">
                ☰
            </button>
        </div>
        
        <div class="mobile-menu" role="navigation" aria-label="<?php esc_attr_e('Menu mobile', 'alumni-iut-laval'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'mobile-menu__list',
                'container'      => false,
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li><a href="' . esc_url(wp_login_url()) . '" class="mobile-menu__link">' . esc_html__('Se connecter', 'alumni-iut-laval') . '</a></li></ul>',
            ));
            ?>
        </div>
    </header>

    <main id="primary" class="site-main">
