<?php
/**
 * Template part for displaying article cards
 *
 * @package Alumni_IUT_Laval
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card card--article'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('alumni-thumbnail', array('class' => 'card__image')); ?>
        </a>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>">
            <img src="https://via.placeholder.com/400x240" alt="<?php the_title_attribute(); ?>" class="card__image">
        </a>
    <?php endif; ?>
    
    <div class="card__content">
        <div class="card__header">
            <?php alumni_iut_category_badge(); ?>
            <span class="card__date"><?php echo esc_html(get_the_date()); ?></span>
        </div>
        
        <h3 class="card__title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <p class="card__description">
            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
        </p>
        
        <div class="card__meta">
            <span class="card__meta-item">
                👤 <?php the_author(); ?>
            </span>
            <span class="card__meta-item">
                🕐 <?php alumni_iut_reading_time(); ?>
            </span>
        </div>
    </div>
</article>
