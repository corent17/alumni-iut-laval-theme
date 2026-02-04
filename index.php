<?php
/**
 * The main template file
 *
 * @package Alumni_IUT_Laval
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php
        if (have_posts()) :

            if (is_home() && !is_front_page()) :
                ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            // Start the Loop
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            // Pagination
            the_posts_navigation(array(
                'prev_text' => __('Articles précédents', 'alumni-iut-laval'),
                'next_text' => __('Articles suivants', 'alumni-iut-laval'),
            ));

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div><!-- .content-area -->

    <?php get_sidebar(); ?>
</div><!-- .container -->

<?php
get_footer();
