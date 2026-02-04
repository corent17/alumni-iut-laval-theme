<?php
/**
 * Custom search form
 *
 * @package Alumni_IUT_Laval
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field">
        <span class="screen-reader-text"><?php esc_html_e('Rechercher:', 'alumni-iut-laval'); ?></span>
    </label>
    <input 
        type="search" 
        id="search-field" 
        class="search-field" 
        placeholder="<?php esc_attr_e('Rechercher...', 'alumni-iut-laval'); ?>" 
        value="<?php echo get_search_query(); ?>" 
        name="s" 
        required
    />
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php esc_html_e('Rechercher', 'alumni-iut-laval'); ?></span>
        <span aria-hidden="true">🔍</span>
    </button>
</form>
