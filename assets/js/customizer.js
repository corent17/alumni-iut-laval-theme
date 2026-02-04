/**
 * Theme Customizer Live Preview
 *
 * @package Alumni_IUT_Laval
 */

(function($) {
    'use strict';

    // Site title
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.header__logo').text(to);
        });
    });

    // Site description
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Footer text
    wp.customize('alumni_iut_footer_text', function(value) {
        value.bind(function(to) {
            $('.footer__bottom p').text(to);
        });
    });

})(jQuery);
