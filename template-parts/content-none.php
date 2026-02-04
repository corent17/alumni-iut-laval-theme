<?php
/**
 * Template part for displaying a message when no posts are found
 *
 * @package Alumni_IUT_Laval
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Aucun contenu trouvé', 'alumni-iut-laval'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        __('Prêt à publier votre premier article ? <a href="%1$s">Commencez ici</a>.', 'alumni-iut-laval'),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e('Désolé, aucun résultat ne correspond à votre recherche. Veuillez essayer avec d\'autres mots-clés.', 'alumni-iut-laval'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e('Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche pourrait vous aider.', 'alumni-iut-laval'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
