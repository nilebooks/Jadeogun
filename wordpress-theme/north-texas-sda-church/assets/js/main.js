/**
 * North Texas SDA Church Theme JavaScript
 *
 * @package North_Texas_SDA_Church
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initHeaderScroll();
        initMobileMenu();
        initDropdowns();
        initFAQ();
        initCountdown();
        initPrayerModal();
        initForms();
        initSmoothScroll();
    });

    /**
     * Header scroll effect
     */
    function initHeaderScroll() {
        const header = $('#site-header');
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        const navMenu = $('#nav-menu');
        const mobileToggle = $('.mobile-toggle');
        const mobileClose = $('.mobile-close');

        mobileToggle.on('click', function() {
            navMenu.addClass('active');
            $('body').addClass('menu-open');
        });

        mobileClose.on('click', function() {
            navMenu.removeClass('active');
            $('body').removeClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#nav-menu, .mobile-toggle').length) {
                navMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Mobile dropdown menus
     */
    function initDropdowns() {
        $('.mobile-dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const parent = $(this).closest('.menu-item-has-children, .dropdown');
            parent.toggleClass('active');
            
            const icon = $(this).find('i');
            icon.toggleClass('fa-plus fa-minus');
        });
    }

    /**
     * FAQ accordion
     */
    function initFAQ() {
        $('.faq-question').on('click', function() {
            const item = $(this).closest('.faq-item');
            const isActive = item.hasClass('active');

            // Close all items
            $('.faq-item').removeClass('active');

            // Open clicked item if it wasn't active
            if (!isActive) {
                item.addClass('active');
            }
        });
    }

    /**
     * Countdown timer
     */
    function initCountdown() {
        // Get next Saturday at 9:30 AM
        function getNextSaturday() {
            const now = new Date();
            const dayOfWeek = now.getDay();
            const daysUntilSaturday = (6 - dayOfWeek + 7) % 7;
            
            const nextSaturday = new Date(now);
            nextSaturday.setDate(now.getDate() + (daysUntilSaturday === 0 && now.getHours() >= 9 && now.getMinutes() >= 30 ? 7 : daysUntilSaturday));
            nextSaturday.setHours(9, 30, 0, 0);
            
            return nextSaturday;
        }

        function updateCountdown() {
            const targetDate = getNextSaturday();
            const now = new Date();
            const diff = targetDate - now;

            if (diff <= 0) {
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            // Update countdown band
            $('#countdown-days').text(String(days).padStart(2, '0'));
            $('#countdown-hours').text(String(hours).padStart(2, '0'));
            $('#countdown-minutes').text(String(minutes).padStart(2, '0'));
            $('#countdown-seconds').text(String(seconds).padStart(2, '0'));

            // Update countdown section
            $('#countdown-section-days').text(String(days).padStart(2, '0'));
            $('#countdown-section-hours').text(String(hours).padStart(2, '0'));
            $('#countdown-section-minutes').text(String(minutes).padStart(2, '0'));
            $('#countdown-section-seconds').text(String(seconds).padStart(2, '0'));
        }

        // Initial update
        updateCountdown();
        
        // Update every second
        setInterval(updateCountdown, 1000);
    }

    /**
     * Prayer request modal
     */
    function initPrayerModal() {
        const modal = $('#prayer-modal');
        const openBtn = $('#prayer-request-btn');
        const closeBtn = $('#prayer-modal-close');

        openBtn.on('click', function(e) {
            e.preventDefault();
            modal.addClass('active');
            $('body').addClass('modal-open');
        });

        closeBtn.on('click', function() {
            modal.removeClass('active');
            $('body').removeClass('modal-open');
        });

        // Close modal when clicking overlay
        modal.on('click', function(e) {
            if (e.target === this) {
                modal.removeClass('active');
                $('body').removeClass('modal-open');
            }
        });

        // Close modal with Escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && modal.hasClass('active')) {
                modal.removeClass('active');
                $('body').removeClass('modal-open');
            }
        });
    }

    /**
     * Form handling
     */
    function initForms() {
        // Prayer request form
        $('#prayer-request-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();

            submitBtn.text('Submitting...').prop('disabled', true);

            $.ajax({
                url: ntsdaAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'ntsda_prayer_request',
                    nonce: ntsdaAjax.nonce,
                    name: form.find('input[name="name"]').val(),
                    email: form.find('input[name="email"]').val(),
                    request: form.find('textarea[name="request"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        showPrayerSuccessPopup(response.data.message);
                        form[0].reset();
                        $('#prayer-modal').removeClass('active');
                        $('body').removeClass('modal-open');
                    } else {
                        alert(response.data.message || 'An error occurred. Please try again.');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });

        // Contact form
        $('#ntsda-contact-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const messageDiv = form.siblings('.contact-form-message');
            const originalText = submitBtn.text();

            submitBtn.text('Sending...').prop('disabled', true);

            $.ajax({
                url: ntsdaAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'ntsda_contact_form',
                    nonce: ntsdaAjax.nonce,
                    name: form.find('input[name="name"]').val(),
                    email: form.find('input[name="email"]').val(),
                    phone: form.find('input[name="phone"]').val(),
                    subject: form.find('input[name="subject"]').val(),
                    message: form.find('textarea[name="message"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        messageDiv.html('<p class="success">' + response.data.message + '</p>');
                        form[0].reset();
                    } else {
                        messageDiv.html('<p class="error">' + (response.data.message || 'An error occurred.') + '</p>');
                    }
                },
                error: function() {
                    messageDiv.html('<p class="error">An error occurred. Please try again.</p>');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });

        // Newsletter form
        $('#newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();

            submitBtn.text('...').prop('disabled', true);

            $.ajax({
                url: ntsdaAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'ntsda_newsletter',
                    nonce: ntsdaAjax.nonce,
                    email: form.find('input[name="email"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.data.message);
                        form[0].reset();
                    } else {
                        alert(response.data.message || 'An error occurred.');
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });
    }

    /**
     * Show prayer success popup
     */
    function showPrayerSuccessPopup(message) {
        const overlay = $('<div class="prayer-success-overlay"></div>');
        const popup = $(`
            <div class="prayer-success-popup">
                <div class="prayer-success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h3 class="prayer-success-title">Prayer Request Submitted</h3>
                <p class="prayer-success-message">${message}</p>
                <div class="prayer-success-verse">
                    "The prayer of a righteous person is powerful and effective." - James 5:16
                </div>
                <button class="prayer-success-button">Close</button>
            </div>
        `);

        $('body').append(overlay).append(popup);

        popup.find('.prayer-success-button').on('click', function() {
            overlay.fadeOut(300, function() { $(this).remove(); });
            popup.fadeOut(300, function() { $(this).remove(); });
        });

        overlay.on('click', function() {
            overlay.fadeOut(300, function() { $(this).remove(); });
            popup.fadeOut(300, function() { $(this).remove(); });
        });
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname
            ) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                }
            }
        });
    }

})(jQuery);
