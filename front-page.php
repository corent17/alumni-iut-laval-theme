<?php
/**
 * Template for displaying the front page (homepage)
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero hero--primary">
    <div class="hero__container">
        <div class="hero__content">
            <h1 class="hero__title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
            <p class="hero__description">
                <?php
                $description = get_bloginfo('description', 'display');
                if ($description) {
                    echo esc_html($description);
                } else {
                    esc_html_e('Rejoignez le réseau des anciens étudiants de l\'IUT de Laval. Plus de 2000 alumni connectés pour partager, échanger et évoluer ensemble.', 'alumni-iut-laval');
                }
                ?>
            </p>
            <div class="hero__badges">
                <?php
                $departments = get_terms(array(
                    'taxonomy'   => 'departement',
                    'hide_empty' => false,
                ));
                
                if (!is_wp_error($departments) && !empty($departments)) :
                    foreach ($departments as $dept) :
                        ?>
                        <span class="badge badge--<?php echo esc_attr($dept->slug); ?>"><?php echo esc_html($dept->name); ?></span>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="hero__cta">
                <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn btn--secondary">
                    <?php esc_html_e('Rejoindre le réseau', 'alumni-iut-laval'); ?>
                </a>
                <?php
                $about_page = get_page_by_path('a-propos');
                if ($about_page) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($about_page)); ?>" class="btn btn--outline-light">
                        <?php esc_html_e('En savoir plus', 'alumni-iut-laval'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="hero__carousel">
                <?php
                $hero_image = get_header_image();
                if ($hero_image) :
                    ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="hero__carousel-image">
                <?php else : ?>
                    <img src="https://via.placeholder.com/1200x400" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="hero__carousel-image">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats__grid">
            <div class="stats__item">
                <div class="stats__number">2000+</div>
                <div class="stats__label"><?php esc_html_e('Alumni actifs', 'alumni-iut-laval'); ?></div>
            </div>
            <div class="stats__item">
                <div class="stats__number">50+</div>
                <div class="stats__label"><?php esc_html_e('Entreprises partenaires', 'alumni-iut-laval'); ?></div>
            </div>
            <div class="stats__item">
                <div class="stats__number">20+</div>
                <div class="stats__label"><?php esc_html_e('Événements par an', 'alumni-iut-laval'); ?></div>
            </div>
            <div class="stats__item">
                <div class="stats__number">24/7</div>
                <div class="stats__label"><?php esc_html_e('Plateforme accessible', 'alumni-iut-laval'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news section">
    <div class="container">
        <div class="news__header">
            <h2 class="news__title"><?php esc_html_e('Actualités', 'alumni-iut-laval'); ?></h2>
            <p><?php esc_html_e('Restez informés des dernières nouvelles du réseau', 'alumni-iut-laval'); ?></p>
        </div>
        <div class="news__grid">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 4,
                'post_status'    => 'publish',
            ));

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    get_template_part('template-parts/card', 'article');
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e('Aucune actualité pour le moment.', 'alumni-iut-laval'); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services section">
    <div class="container">
        <div class="services__header">
            <h2 class="services__title"><?php esc_html_e('Nos Services', 'alumni-iut-laval'); ?></h2>
            <p><?php esc_html_e('Des services pour accompagner votre parcours professionnel', 'alumni-iut-laval'); ?></p>
        </div>
        <div class="services__grid">
            <article class="card card--service">
                <div class="card__content">
                    <h3 class="card__title"><?php esc_html_e('Parrainage de promo', 'alumni-iut-laval'); ?></h3>
                    <p class="card__description">
                        <?php esc_html_e('Devenez parrain ou marraine d\'une promotion et transmettez votre expérience aux nouveaux diplômés.', 'alumni-iut-laval'); ?>
                    </p>
                </div>
            </article>

            <article class="card card--service">
                <div class="card__content">
                    <h3 class="card__title"><?php esc_html_e('Les offres pro', 'alumni-iut-laval'); ?></h3>
                    <p class="card__description">
                        <?php esc_html_e('Accédez à des offres d\'emploi exclusives réservées aux membres du réseau Alumni.', 'alumni-iut-laval'); ?>
                    </p>
                </div>
            </article>

            <article class="card card--service">
                <div class="card__content">
                    <h3 class="card__title"><?php esc_html_e('À venir', 'alumni-iut-laval'); ?></h3>
                    <p class="card__description">
                        <?php esc_html_e('De nouveaux services en cours de développement pour enrichir votre expérience alumni.', 'alumni-iut-laval'); ?>
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter">
    <div class="container">
        <h2 class="newsletter__title"><?php esc_html_e('Rejoignez notre communauté email', 'alumni-iut-laval'); ?></h2>
        <p class="newsletter__description">
            <?php esc_html_e('Restez informé des dernières actualités, événements et opportunités du réseau Alumni IUT Laval.', 'alumni-iut-laval'); ?>
        </p>
        <form class="newsletter-form" aria-label="<?php esc_attr_e('Formulaire d\'inscription à la newsletter', 'alumni-iut-laval'); ?>" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="newsletter_subscribe">
            <?php wp_nonce_field('newsletter_subscribe', 'newsletter_nonce'); ?>
            <div class="newsletter-form__input-group">
                <input 
                    type="email" 
                    name="newsletter_email"
                    class="newsletter-form__input" 
                    placeholder="<?php esc_attr_e('Votre adresse email', 'alumni-iut-laval'); ?>" 
                    required
                    aria-label="<?php esc_attr_e('Adresse email', 'alumni-iut-laval'); ?>"
                >
                <button type="submit" class="btn btn--secondary"><?php esc_html_e('S\'inscrire', 'alumni-iut-laval'); ?></button>
            </div>
        </form>
    </div>
</section>

<?php
get_footer();
