<?php
/**
 * Template for displaying search results
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<section class="search-results">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Résultats de recherche pour : %s', 'alumni-iut-laval'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>

            <div class="search-results__grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="search-result__thumbnail">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="search-result__content">
                            <h2 class="search-result__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="search-result__meta">
                                <span class="search-result__type">
                                    <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                                </span>
                                <span class="search-result__date">
                                    <?php echo esc_html(get_the_date()); ?>
                                </span>
                            </div>
                            
                            <div class="search-result__excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="search-result__link">
                                <?php esc_html_e('Lire la suite', 'alumni-iut-laval'); ?> →
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Précédent', 'alumni-iut-laval'),
                'next_text' => __('Suivant &raquo;', 'alumni-iut-laval'),
            ));
            ?>

        <?php else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
