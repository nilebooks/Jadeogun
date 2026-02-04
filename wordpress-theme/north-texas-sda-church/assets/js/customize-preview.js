/**
 * Theme Customizer Live Preview
 *
 * @package North_Texas_SDA_Church
 */

(function($) {
    'use strict';

    // Church Name
    wp.customize('ntsda_church_name', function(value) {
        value.bind(function(newval) {
            $('.logo-text, .footer-logo-title').text(newval);
        });
    });

    // Tagline
    wp.customize('ntsda_tagline', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle').text(newval);
        });
    });

})(jQuery);
