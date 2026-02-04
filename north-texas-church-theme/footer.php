    <footer class="footer" data-scroll-section>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <?php if (has_custom_logo()) : ?>
                            <div class="footer-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" style="max-width: 200px;">
                        <?php endif; ?>
                        <h3><?php bloginfo('name'); ?></h3>
                        <p><?php bloginfo('description'); ?></p>
                        <?php if (get_theme_mod('church_address')) : ?>
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html(get_theme_mod('church_address')); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3><?php _e('Quick Links', 'north-texas-church'); ?></h3>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'north-texas-church'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('About Us', 'north-texas-church'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/events')); ?>"><?php _e('Events', 'north-texas-church'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/sermons')); ?>"><?php _e('Sermons', 'north-texas-church'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Contact', 'north-texas-church'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3><?php _e('Contact Us', 'north-texas-church'); ?></h3>
                        <ul>
                            <?php if (get_theme_mod('church_phone')) : ?>
                                <li><i class="fas fa-phone"></i> <?php echo esc_html(get_theme_mod('church_phone')); ?></li>
                            <?php endif; ?>
                            <?php if (get_theme_mod('church_email')) : ?>
                                <li><i class="fas fa-envelope"></i> <?php echo esc_html(get_theme_mod('church_email')); ?></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <h3><?php _e('Connect With Us', 'north-texas-church'); ?></h3>
                        <p><?php _e('Join us in worship and fellowship. Follow us on social media to stay updated.', 'north-texas-church'); ?></p>
                        <div class="social-links">
                            <?php
                            $social_networks = array(
                                'facebook' => 'fab fa-facebook-f',
                                'twitter' => 'fab fa-twitter',
                                'instagram' => 'fab fa-instagram',
                                'youtube' => 'fab fa-youtube',
                                'linkedin' => 'fab fa-linkedin-in',
                            );

                            foreach ($social_networks as $network => $icon) {
                                $url = get_theme_mod($network . '_url');
                                if ($url) {
                                    echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer"><i class="' . esc_attr($icon) . '"></i></a>';
                                }
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'north-texas-church'); ?></p>
            </div>
        </div>
    </footer>

    <!-- Prayer Request Modal -->
    <div class="prayer-request-modal" id="prayer-request-modal">
        <div class="prayer-modal-container">
            <div class="prayer-modal-close" id="prayer-modal-close">
                <i class="fas fa-times"></i>
            </div>
            <div class="prayer-modal-content">
                <div class="prayer-modal-image">
                    <img src="https://omag.b-cdn.net/wp-content/uploads/2022/01/22_0113_MULTIETHNIC_Unity-in-Diversity-Through-Prayer_1021x640.jpg" alt="Prayer">
                    <div class="prayer-image-overlay"></div>
                    <div class="prayer-image-text">
                        <h2><?php _e('We Are Here To Pray With You', 'north-texas-church'); ?></h2>
                        <p><?php _e('"Therefore I tell you, whatever you ask for in prayer, believe that you have received it, and it will be yours." - Mark 11:24', 'north-texas-church'); ?></p>
                    </div>
                </div>
                <div class="prayer-modal-form">
                    <h2 class="prayer-form-title"><?php _e('Submit Your Prayer Request', 'north-texas-church'); ?></h2>
                    <p class="prayer-form-subtitle"><?php _e('Share your prayer needs with us. Our prayer team is committed to lifting your requests to God.', 'north-texas-church'); ?></p>

                    <form id="prayer-form" class="prayer-form">
                        <div class="form-group">
                            <label for="prayer-name"><?php _e('Your Name*', 'north-texas-church'); ?></label>
                            <input type="text" id="prayer-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="prayer-email"><?php _e('Email Address*', 'north-texas-church'); ?></label>
                            <input type="email" id="prayer-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="prayer-phone"><?php _e('Phone Number', 'north-texas-church'); ?></label>
                            <input type="tel" id="prayer-phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="prayer-category"><?php _e('Prayer Request Category*', 'north-texas-church'); ?></label>
                            <select id="prayer-category" name="category" required>
                                <option value=""><?php _e('Select a category', 'north-texas-church'); ?></option>
                                <option value="Healing"><?php _e('Healing', 'north-texas-church'); ?></option>
                                <option value="Deliverance"><?php _e('Deliverance', 'north-texas-church'); ?></option>
                                <option value="Finance"><?php _e('Finance', 'north-texas-church'); ?></option>
                                <option value="Job & Business"><?php _e('Job & Business', 'north-texas-church'); ?></option>
                                <option value="Family"><?php _e('Family', 'north-texas-church'); ?></option>
                                <option value="Spiritual Growth"><?php _e('Spiritual Growth', 'north-texas-church'); ?></option>
                                <option value="Other"><?php _e('Other', 'north-texas-church'); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prayer-request"><?php _e('Prayer Request Details*', 'north-texas-church'); ?></label>
                            <textarea id="prayer-request" name="request" rows="4" required></textarea>
                        </div>
                        <div class="form-group checkbox-group">
                            <input type="checkbox" id="prayer-confidential" name="confidential">
                            <label for="prayer-confidential"><?php _e('Keep this request confidential (only prayer team will see it)', 'north-texas-church'); ?></label>
                        </div>
                        <div class="form-group checkbox-group">
                            <input type="checkbox" id="prayer-contact-me" name="contact_me">
                            <label for="prayer-contact-me"><?php _e('I would like someone to contact me about this request', 'north-texas-church'); ?></label>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary"><?php _e('Submit Prayer Request', 'north-texas-church'); ?></button>
                        </div>
                        <div id="prayer-form-message" class="form-message"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- .scroll-container -->

<?php wp_footer(); ?>
</body>
</html>
