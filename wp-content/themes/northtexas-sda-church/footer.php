<?php
$about_url = ntxsda_html_url('about');
$youth_url = ntxsda_html_url('youth-ministry');
$sermons_url = ntxsda_html_url('sermons');
$events_url = ntxsda_html_url('events');
$blog_url = ntxsda_html_url('blog');
$contact_url = ntxsda_html_url('contact');
$home_url = ntxsda_html_url('index');
?>
	<footer class="footer" data-scroll-section>
		<div class="container">
			<div class="footer-container">
				<div class="footer-column">
					<h3 class="footer-title">Stay Connected</h3>
					<p class="footer-text">Get updates on events and inspiration.</p>
					<div class="footer-subscribe">
						<input type="email" class="footer-input" placeholder="Email*" required>
						<button type="submit" class="footer-button">Subscribe</button>
					</div>
				</div>

				<div class="footer-column">
					<h3 class="footer-title">Pages</h3>
					<ul class="footer-links">
						<li class="footer-link-item"><a href="<?php echo esc_url($about_url); ?>" class="footer-link">About Us</a></li>
						<li class="footer-link-item"><a href="<?php echo esc_url($youth_url); ?>" class="footer-link">Ministries</a></li>
						<li class="footer-link-item"><a href="<?php echo esc_url($sermons_url); ?>" class="footer-link">Sermons</a></li>
						<li class="footer-link-item"><a href="https://adventistgiving.org/donate/ANWFHL" class="footer-link" target="_blank" rel="noopener">Our Campaigns</a></li>
					</ul>
				</div>

				<div class="footer-column">
					<h3 class="footer-title">Location</h3>
					<div class="footer-address">
						Denton First SDA Church<br>
						11010 US-HWY 377<br>
						Pilot Point, TX 76258
					</div>
				</div>

				<div class="footer-column">
					<h3 class="footer-title">Contact</h3>
					<div class="footer-contact-info">
						<p class="footer-contact-item">+1 (940) 488 9656</p>
						<p class="footer-contact-item">anwfhl-com@txsda.org</p>
					</div>
					<div class="footer-social">
						<a href="https://www.facebook.com/NTXSDA" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.youtube.com/@NorthTexasSDAChurch" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="YouTube"><i class="fab fa-youtube"></i></a>
						<a href="https://www.instagram.com/ntxsda/" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
						<a href="https://wa.me/19404889656" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="footer-logo">
					<img src="<?php echo esc_url(ntxsda_remote_asset('images/logo.png')); ?>" alt="North Texas SDA Church Logo">
					<div class="footer-logo-text">
						<span class="footer-logo-title">North Texas</span>
						<span class="footer-logo-subtitle">SDA Church</span>
					</div>
				</div>
				<div class="footer-copyright">
					<span>© <?php echo esc_html(date('Y')); ?> - All Rights Reserved</span>
					<span class="footer-developer">Designed and Developed by <a href="https://adventtech.ca/">Advent Tech</a></span>
				</div>
			</div>
		</div>
	</footer>

</div><!-- End of scroll-container -->

<a href="<?php echo esc_url($home_url); ?>#hero" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

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
					<h2>We Are Here To Pray With You</h2>
					<p>"Therefore I tell you, whatever you ask for in prayer, believe that you have received it, and it will be yours." - Mark 11:24</p>
				</div>
			</div>
			<div class="prayer-modal-form">
				<h2 class="prayer-form-title">Submit Your Prayer Request</h2>
				<p class="prayer-form-subtitle">Share your prayer needs with us. Our prayer team is committed to lifting your requests to God.</p>

				<form id="modal-prayer-form" class="prayer-form">
					<div class="form-group">
						<label for="modal-name">Your Name*</label>
						<input type="text" id="modal-name" name="name" required>
					</div>
					<div class="form-group">
						<label for="modal-email">Email Address*</label>
						<input type="email" id="modal-email" name="email" required>
					</div>
					<div class="form-group">
						<label for="modal-category">Prayer Request Category*</label>
						<select id="modal-category" name="category" required>
							<option value="">Select a category</option>
							<option value="Healing">Healing</option>
							<option value="Deliverance">Deliverance</option>
							<option value="Finance">Finance</option>
							<option value="Job &amp; Business">Job &amp; Business</option>
							<option value="Family">Family</option>
							<option value="Spiritual Growth">Spiritual Growth</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label for="modal-request">Prayer Request Details*</label>
						<textarea id="modal-request" name="request" rows="4" required></textarea>
					</div>
					<div class="form-group checkbox-group">
						<input type="checkbox" id="modal-confidential" name="confidential">
						<label for="modal-confidential">Keep this request confidential (only prayer team will see it)</label>
					</div>
					<div class="form-group checkbox-group">
						<input type="checkbox" id="modal-contact-me" name="contact-me">
						<label for="modal-contact-me">I would like someone to contact me about this request</label>
					</div>
					<div class="form-submit">
						<button type="submit" class="btn btn-primary">Submit Prayer Request</button>
					</div>
					<div id="modal-form-message" class="form-message"></div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
