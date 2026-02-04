<?php
/**
 * Template Name: À propos
 * Template for displaying the About page
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<?php
while (have_posts()) :
    the_post();
    ?>

    <!-- Hero Banner -->
    <section class="hero hero--primary hero--banner">
        <div class="hero__container">
            <div class="hero__content">
                <h1 class="hero__title"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="history section">
        <div class="container">
            <div class="history__content">
                <div class="history__text">
                    <?php the_content(); ?>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="history__image-container">
                        <?php the_post_thumbnail('alumni-featured', array('class' => 'history__image')); ?>
                    </div>
                <?php else : ?>
                    <div class="history__image-container">
                        <img src="https://via.placeholder.com/600x400" alt="<?php echo esc_attr(get_the_title()); ?>" class="history__image">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="values__header">
                <h2 class="values__title"><?php esc_html_e('Nos Valeurs', 'alumni-iut-laval'); ?></h2>
            </div>
            <div class="values__grid">
                <div class="values__item">
                    <div class="values__icon">🤝</div>
                    <h3 class="values__name"><?php esc_html_e('Solidarité', 'alumni-iut-laval'); ?></h3>
                </div>
                <div class="values__item">
                    <div class="values__icon">⭐</div>
                    <h3 class="values__name"><?php esc_html_e('Excellence', 'alumni-iut-laval'); ?></h3>
                </div>
                <div class="values__item">
                    <div class="values__icon">💪</div>
                    <h3 class="values__name"><?php esc_html_e('Engagement', 'alumni-iut-laval'); ?></h3>
                </div>
                <div class="values__item">
                    <div class="values__icon">💡</div>
                    <h3 class="values__name"><?php esc_html_e('Innovation', 'alumni-iut-laval'); ?></h3>
                </div>
                <div class="values__item">
                    <div class="values__icon">🎉</div>
                    <h3 class="values__name"><?php esc_html_e('Convivialité', 'alumni-iut-laval'); ?></h3>
                </div>
                <div class="values__item">
                    <div class="values__icon">👔</div>
                    <h3 class="values__name"><?php esc_html_e('Professionnalisme', 'alumni-iut-laval'); ?></h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats stats--about">
        <div class="container">
            <div class="stats__grid">
                <div class="stats__item">
                    <div class="stats__number">10 000+</div>
                    <div class="stats__label"><?php esc_html_e('Alumni', 'alumni-iut-laval'); ?></div>
                </div>
                <div class="stats__item">
                    <div class="stats__number">4</div>
                    <div class="stats__label"><?php esc_html_e('Départements', 'alumni-iut-laval'); ?></div>
                </div>
                <div class="stats__item">
                    <div class="stats__number">50+</div>
                    <div class="stats__label"><?php esc_html_e('Événements par an', 'alumni-iut-laval'); ?></div>
                </div>
                <div class="stats__item">
                    <div class="stats__number">500+</div>
                    <div class="stats__label"><?php esc_html_e('Offres d\'emploi', 'alumni-iut-laval'); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Missions Section -->
    <section class="missions section">
        <div class="container">
            <div class="missions__header">
                <h2 class="missions__title"><?php esc_html_e('Nos Missions', 'alumni-iut-laval'); ?></h2>
            </div>
            <div class="missions__grid">
                <div class="missions__item">
                    <h3><?php esc_html_e('Animation du réseau', 'alumni-iut-laval'); ?></h3>
                    <p><?php esc_html_e('Organiser des événements et des rencontres pour maintenir le lien entre alumni.', 'alumni-iut-laval'); ?></p>
                </div>
                <div class="missions__item">
                    <h3><?php esc_html_e('Opportunités professionnelles', 'alumni-iut-laval'); ?></h3>
                    <p><?php esc_html_e('Partager des offres d\'emploi et créer des opportunités de carrière.', 'alumni-iut-laval'); ?></p>
                </div>
                <div class="missions__item">
                    <h3><?php esc_html_e('Accompagnement carrière', 'alumni-iut-laval'); ?></h3>
                    <p><?php esc_html_e('Proposer du mentorat et des conseils pour le développement professionnel.', 'alumni-iut-laval'); ?></p>
                </div>
                <div class="missions__item">
                    <h3><?php esc_html_e('Lien avec l\'IUT', 'alumni-iut-laval'); ?></h3>
                    <p><?php esc_html_e('Maintenir et renforcer les liens avec l\'IUT de Laval.', 'alumni-iut-laval'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Section -->
    <section class="join-community section">
        <div class="container">
            <div class="join-community__header">
                <h2 class="join-community__title"><?php esc_html_e('Rejoignez la communauté', 'alumni-iut-laval'); ?></h2>
            </div>
            <div class="join-community__departments">
                <?php
                $departments = get_terms(array(
                    'taxonomy'   => 'departement',
                    'hide_empty' => false,
                ));
                
                if (!is_wp_error($departments) && !empty($departments)) :
                    foreach ($departments as $dept) :
                        ?>
                        <a href="<?php echo esc_url(get_term_link($dept)); ?>" class="btn btn--<?php echo esc_attr($dept->slug); ?>">
                            <?php echo esc_html($dept->name); ?>
                        </a>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

<?php
endwhile;
?>

<?php
get_footer();
