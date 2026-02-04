/**
 * North Texas SDA Church Theme JavaScript
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        initMobileMenu();
        initPrayerRequestModal();
        initCountdownTimer();
        initSmoothScrolling();
        initScrollAnimations();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const mobileToggle = $('#mobile-toggle');
        const navMenu = $('#nav-menu');
        const mobileClose = $('#mobile-close');

        mobileToggle.on('click', function() {
            navMenu.addClass('active');
        });

        mobileClose.on('click', function() {
            navMenu.removeClass('active');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-menu, .mobile-toggle').length) {
                navMenu.removeClass('active');
            }
        });

        // Close menu when clicking on a link
        navMenu.find('a').on('click', function() {
            if ($(window).width() < 992) {
                navMenu.removeClass('active');
            }
        });
    }

    /**
     * Prayer Request Modal
     */
    function initPrayerRequestModal() {
        const modal = $('#prayer-request-modal');
        const openBtn = $('.prayer-request-btn');
        const closeBtn = $('#prayer-modal-close');
        const form = $('#prayer-form');

        // Open modal
        openBtn.on('click', function(e) {
            e.preventDefault();
            modal.addClass('active');
            $('body').css('overflow', 'hidden');
        });

        // Close modal
        closeBtn.on('click', function() {
            modal.removeClass('active');
            $('body').css('overflow', 'auto');
        });

        // Close modal when clicking outside
        modal.on('click', function(e) {
            if ($(e.target).is(modal)) {
                modal.removeClass('active');
                $('body').css('overflow', 'auto');
            }
        });

        // Handle form submission
        form.on('submit', function(e) {
            e.preventDefault();

            const formData = {
                action: 'submit_prayer_request',
                nonce: northTexasChurch.nonce,
                name: $('#prayer-name').val(),
                email: $('#prayer-email').val(),
                phone: $('#prayer-phone').val(),
                category: $('#prayer-category').val(),
                request: $('#prayer-request').val(),
                confidential: $('#prayer-confidential').is(':checked') ? '1' : '0',
                contact_me: $('#prayer-contact-me').is(':checked') ? '1' : '0'
            };

            // Show loading state
            form.find('button[type="submit"]').prop('disabled', true).text('Submitting...');

            $.ajax({
                url: northTexasChurch.ajaxurl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        showSuccessPopup();
                        form[0].reset();
                        setTimeout(function() {
                            modal.removeClass('active');
                            $('body').css('overflow', 'auto');
                        }, 3000);
                    } else {
                        showFormMessage('error', response.data.message || 'There was an error submitting your prayer request. Please try again.');
                    }
                },
                error: function() {
                    showFormMessage('error', 'There was an error connecting to the server. Please try again.');
                },
                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false).text('Submit Prayer Request');
                }
            });
        });
    }

    /**
     * Show form message
     */
    function showFormMessage(type, message) {
        const messageDiv = $('#prayer-form-message');
        messageDiv.removeClass('success error').addClass(type).text(message).show();
        
        setTimeout(function() {
            messageDiv.fadeOut();
        }, 5000);
    }

    /**
     * Show success popup
     */
    function showSuccessPopup() {
        const popup = $('<div>', {
            class: 'prayer-success-overlay',
            html: `
                <div class="prayer-success-popup">
                    <div class="prayer-success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3 class="prayer-success-title">Prayer Request Submitted!</h3>
                    <p class="prayer-success-message">Thank you for sharing your prayer request with us. Our prayer team will be lifting your needs to God.</p>
                    <div class="prayer-success-verse">"The prayer of a righteous person is powerful and effective." - James 5:16</div>
                </div>
            `
        });

        $('body').append(popup);

        setTimeout(function() {
            popup.fadeOut(function() {
                popup.remove();
            });
        }, 3000);
    }

    /**
     * Countdown Timer
     */
    function initCountdownTimer() {
        const daysEl = $('#countdown-days');
        const hoursEl = $('#countdown-hours');
        const minutesEl = $('#countdown-minutes');
        const secondsEl = $('#countdown-seconds');

        if (!daysEl.length) return;

        // Calculate next Saturday at 10:00 AM
        function getNextSaturday() {
            const now = new Date();
            const saturday = new Date();
            const daysUntilSaturday = (6 - now.getDay() + 7) % 7 || 7;
            
            saturday.setDate(now.getDate() + daysUntilSaturday);
            saturday.setHours(10, 0, 0, 0);

            // If it's Saturday and past 10 AM, set for next Saturday
            if (now.getDay() === 6 && now.getHours() >= 10) {
                saturday.setDate(saturday.getDate() + 7);
            }

            return saturday;
        }

        function updateCountdown() {
            const now = new Date().getTime();
            const targetDate = getNextSaturday().getTime();
            const difference = targetDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                daysEl.text(days.toString().padStart(2, '0'));
                hoursEl.text(hours.toString().padStart(2, '0'));
                minutesEl.text(minutes.toString().padStart(2, '0'));
                secondsEl.text(seconds.toString().padStart(2, '0'));
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    }

    /**
     * Smooth Scrolling
     */
    function initSmoothScrolling() {
        // Initialize Lenis smooth scrolling if available
        if (typeof Lenis !== 'undefined') {
            const lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                smooth: true,
                mouseMultiplier: 1,
                smoothTouch: false,
                touchMultiplier: 2,
                infinite: false,
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }

            requestAnimationFrame(raf);
        }

        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });
    }

    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        // Simple scroll reveal animation
        $(window).on('scroll', function() {
            $('.event-card, .mvv-box, [data-scroll]').each(function() {
                const elementTop = $(this).offset().top;
                const elementBottom = elementTop + $(this).outerHeight();
                const viewportTop = $(window).scrollTop();
                const viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('visible');
                }
            });
        });

        // Trigger once on load
        $(window).trigger('scroll');
    }

    /**
     * Header Scroll Effect
     */
    $(window).on('scroll', function() {
        const header = $('.header');
        if ($(window).scrollTop() > 100) {
            header.addClass('scrolled');
        } else {
            header.removeClass('scrolled');
        }
    });

    /**
     * Back to Top Button (if needed)
     */
    function initBackToTop() {
        const backToTop = $('<button>', {
            class: 'back-to-top',
            html: '<i class="fas fa-arrow-up"></i>',
            css: {
                position: 'fixed',
                bottom: '30px',
                right: '30px',
                width: '50px',
                height: '50px',
                background: 'linear-gradient(135deg, #1e3a8a, #3b82f6)',
                color: '#fff',
                border: 'none',
                borderRadius: '50%',
                cursor: 'pointer',
                display: 'none',
                zIndex: 1000,
                fontSize: '18px',
                boxShadow: '0 5px 15px rgba(30, 58, 138, 0.3)',
                transition: 'all 0.3s ease'
            }
        });

        $('body').append(backToTop);

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 500) {
                backToTop.fadeIn();
            } else {
                backToTop.fadeOut();
            }
        });

        backToTop.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        });
    }

    initBackToTop();

})(jQuery);
