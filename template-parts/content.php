<?php
/**
 * Template part for displaying posts
 *
 * @package Alumni_IUT_Laval
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

        <div class="entry-meta">
            <?php
            alumni_iut_posted_on();
            alumni_iut_posted_by();
            ?>
        </div>
    </header>

    <?php alumni_iut_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
        endif;
        ?>
    </div>

    <footer class="entry-footer">
        <?php
        if (is_singular()) :
            the_tags('<span class="tags-links">' . esc_html__('Tags: ', 'alumni-iut-laval'), ', ', '</span>');
        endif;
        ?>
    </footer>
</article>
