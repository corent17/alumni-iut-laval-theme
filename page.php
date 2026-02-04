<?php
/**
 * Template for displaying all pages
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<div class="container page-content section">
    <?php
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="page-thumbnail">
                    <?php the_post_thumbnail('alumni-featured'); ?>
                </div>
            <?php endif; ?>

            <div class="page-content-inner">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'alumni-iut-laval'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
