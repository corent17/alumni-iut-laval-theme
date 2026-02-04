<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<section class="error-404 not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Oups ! Page non trouvée', 'alumni-iut-laval'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e('Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche pourrait vous aider.', 'alumni-iut-laval'); ?></p>

            <?php get_search_form(); ?>

            <div class="error-404__suggestions">
                <h2><?php esc_html_e('Suggestions', 'alumni-iut-laval'); ?></h2>
                
                <div class="error-404__links">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                        <?php esc_html_e('Retour à l\'accueil', 'alumni-iut-laval'); ?>
                    </a>
                    
                    <?php
                    $about_page = get_page_by_path('a-propos');
                    if ($about_page) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($about_page)); ?>" class="btn btn--outline">
                            <?php esc_html_e('Découvrir Alumni IUT', 'alumni-iut-laval'); ?>
                        </a>
                    <?php endif; ?>
                    
                    <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn btn--outline">
                        <?php esc_html_e('Voir les actualités', 'alumni-iut-laval'); ?>
                    </a>
                </div>

                <?php
                // Show recent posts
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ));

                if ($recent_posts->have_posts()) :
                    ?>
                    <div class="error-404__recent">
                        <h3><?php esc_html_e('Articles récents', 'alumni-iut-laval'); ?></h3>
                        <div class="error-404__recent-grid">
                            <?php
                            while ($recent_posts->have_posts()) :
                                $recent_posts->the_post();
                                ?>
                                <article class="recent-post">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <span class="recent-post__date"><?php echo esc_html(get_the_date()); ?></span>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
