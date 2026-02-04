<?php
/**
 * Custom template tags for this theme
 *
 * @package Alumni_IUT_Laval
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display post thumbnail
 */
function alumni_iut_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('alumni-featured'); ?>
        </div>
        <?php
    else :
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail('alumni-thumbnail', array(
                'alt' => the_title_attribute(array('echo' => false)),
            ));
            ?>
        </a>
        <?php
    endif;
}

/**
 * Get département badge HTML
 */
function alumni_iut_get_departement_badge($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $terms = get_the_terms($post_id, 'departement');
    if (!$terms || is_wp_error($terms)) {
        return '';
    }

    $output = '';
    foreach ($terms as $term) {
        $slug = $term->slug;
        $output .= '<span class="badge badge--' . esc_attr($slug) . '">' . esc_html($term->name) . '</span>';
    }

    return $output;
}

/**
 * Display département badge
 */
function alumni_iut_departement_badge($post_id = null) {
    echo alumni_iut_get_departement_badge($post_id);
}

/**
 * Get post category badge
 */
function alumni_iut_get_category_badge($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $categories = get_the_category($post_id);
    if (!$categories) {
        return '';
    }

    $output = '';
    foreach ($categories as $category) {
        $slug = $category->slug;
        $output .= '<span class="badge badge--' . esc_attr($slug) . '">' . esc_html(strtoupper($category->name)) . '</span>';
    }

    return $output;
}

/**
 * Display category badge
 */
function alumni_iut_category_badge($post_id = null) {
    echo alumni_iut_get_category_badge($post_id);
}

/**
 * Display posted on date
 */
function alumni_iut_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf($time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Display post author
 */
function alumni_iut_posted_by() {
    echo '<span class="byline">';
    echo '<span class="author vcard">';
    echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
    echo esc_html(get_the_author());
    echo '</a>';
    echo '</span>';
    echo '</span>';
}

/**
 * Get reading time
 */
function alumni_iut_get_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute

    return $reading_time;
}

/**
 * Display reading time
 */
function alumni_iut_reading_time($post_id = null) {
    $time = alumni_iut_get_reading_time($post_id);
    printf(
        '<span class="reading-time">%d %s</span>',
        $time,
        _n('min', 'min', $time, 'alumni-iut-laval')
    );
}

/**
 * Display breadcrumbs
 */
function alumni_iut_breadcrumbs() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumb" aria-label="' . esc_attr__('Fil d\'Ariane', 'alumni-iut-laval') . '">';
    echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Accueil', 'alumni-iut-laval') . '</a>';
    
    if (is_category() || is_single()) {
        echo ' <span class="separator">/</span> ';
        
        if (is_single()) {
            $category = get_the_category();
            if ($category) {
                echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . esc_html($category[0]->name) . '</a>';
                echo ' <span class="separator">/</span> ';
            }
            echo '<span class="current">' . get_the_title() . '</span>';
        } else {
            echo '<span class="current">' . single_cat_title('', false) . '</span>';
        }
    } elseif (is_page()) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . get_the_title() . '</span>';
    } elseif (is_search()) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . esc_html__('Résultats de recherche', 'alumni-iut-laval') . '</span>';
    } elseif (is_404()) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . esc_html__('Page non trouvée', 'alumni-iut-laval') . '</span>';
    }
    
    echo '</nav>';
}
