<?php
/**
 * Template for displaying archive pages (blog listing)
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<!-- Blog Header -->
<section class="blog-header">
    <div class="container">
        <h1 class="blog-header__title">
            <?php
            if (is_category()) :
                single_cat_title();
            elseif (is_tag()) :
                single_tag_title();
            elseif (is_tax('departement')) :
                single_term_title();
            else :
                esc_html_e('ACTU', 'alumni-iut-laval');
            endif;
            ?>
        </h1>
        <p class="blog-header__description">
            <?php
            if (is_category() || is_tag() || is_tax()) :
                the_archive_description();
            else :
                esc_html_e('Restez informés des dernières actualités, événements et témoignages du réseau Alumni IUT Laval.', 'alumni-iut-laval');
            endif;
            ?>
        </p>
    </div>
</section>

<!-- Filters Section -->
<section class="blog-filters">
    <div class="container">
        <div class="filters">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="filter-btn <?php echo !is_tax('departement') ? 'filter-btn--active' : ''; ?>">
                <?php esc_html_e('Tous', 'alumni-iut-laval'); ?>
            </a>
            <?php
            $departments = get_terms(array(
                'taxonomy'   => 'departement',
                'hide_empty' => true,
            ));
            
            if (!is_wp_error($departments) && !empty($departments)) :
                foreach ($departments as $dept) :
                    $is_active = is_tax('departement', $dept->slug);
                    ?>
                    <a href="<?php echo esc_url(get_term_link($dept)); ?>" class="filter-btn <?php echo $is_active ? 'filter-btn--active' : ''; ?>">
                        <?php echo esc_html($dept->name); ?>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Articles Grid -->
<section class="blog-content section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="blog__grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/card', 'article');
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <nav class="pagination" aria-label="<?php esc_attr_e('Navigation de pagination', 'alumni-iut-laval'); ?>">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; Précédent', 'alumni-iut-laval'),
                    'next_text' => __('Suivant &raquo;', 'alumni-iut-laval'),
                ));
                ?>
            </nav>
        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter newsletter--alt">
    <div class="container">
        <h2 class="newsletter__title"><?php esc_html_e('Restez informés de nos actualités', 'alumni-iut-laval'); ?></h2>
        <p class="newsletter__description">
            <?php esc_html_e('Inscrivez-vous à notre newsletter pour ne rien manquer.', 'alumni-iut-laval'); ?>
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
