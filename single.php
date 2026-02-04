<?php
/**
 * Template for displaying single posts
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<?php
while (have_posts()) :
    the_post();
    ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <?php alumni_iut_breadcrumbs(); ?>
        </div>
    </div>

    <!-- Article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
        <div class="container">
            <header class="article__header">
                <div class="article__badge">
                    <?php alumni_iut_category_badge(); ?>
                    <?php alumni_iut_departement_badge(); ?>
                </div>
                <h1 class="article__title"><?php the_title(); ?></h1>
                <div class="article__meta">
                    <span class="article__meta-item">
                        👤 <?php the_author(); ?>
                    </span>
                    <span class="article__meta-item">
                        📅 <?php echo esc_html(get_the_date()); ?>
                    </span>
                    <span class="article__meta-item">
                        🕐 <?php alumni_iut_reading_time(); ?> de lecture
                    </span>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="article__image-wrapper">
                    <?php the_post_thumbnail('alumni-featured', array('class' => 'article__image')); ?>
                </div>
            <?php endif; ?>

            <div class="article__content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'alumni-iut-laval'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <footer class="article__footer">
                <?php
                $tags = get_the_tags();
                if ($tags) :
                    ?>
                    <div class="article__tags">
                        <strong><?php esc_html_e('Tags:', 'alumni-iut-laval'); ?></strong>
                        <?php
                        foreach ($tags as $tag) :
                            ?>
                            <a href="<?php echo esc_url(get_tag_link($tag)); ?>" class="tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                            <?php
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
            </footer>
        </div>
    </article>

    <!-- Related Articles -->
    <?php
    $related_posts = new WP_Query(array(
        'posts_per_page'      => 2,
        'post__not_in'        => array(get_the_ID()),
        'category__in'        => wp_get_post_categories(get_the_ID()),
        'orderby'             => 'rand',
    ));

    if ($related_posts->have_posts()) :
        ?>
        <section class="related-articles">
            <div class="container">
                <div class="related-articles__header">
                    <h2 class="related-articles__title"><?php esc_html_e('Articles connexes', 'alumni-iut-laval'); ?></h2>
                </div>
                <div class="related-articles__grid">
                    <?php
                    while ($related_posts->have_posts()) :
                        $related_posts->the_post();
                        get_template_part('template-parts/card', 'article');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>

    <!-- Comments -->
    <?php
    if (comments_open() || get_comments_number()) :
        ?>
        <div class="container">
            <div class="comments-wrapper">
                <?php comments_template(); ?>
            </div>
        </div>
        <?php
    endif;
    ?>

<?php
endwhile;
?>

<?php
get_footer();
