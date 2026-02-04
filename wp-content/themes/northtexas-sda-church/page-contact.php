<?php
get_header();
?>

<section class="page-header" data-scroll-section>
	<div class="page-header-background" style="background-image: url('https://www.navigators.org/wp-content/uploads/2024/05/061123-Resource-Web-1024x614.jpg');"></div>
	<div class="container">
		<h1 class="page-title" data-scroll>CONTACT US</h1>
		<p class="page-subtitle" data-scroll data-scroll-delay="0.2">We'd love to hear from you! Reach out with your questions, prayer requests, or to plan your visit.</p>
	</div>
</section>

<section class="contact-info-section" data-scroll-section>
	<div class="container">
		<div class="contact-info-container" style="display: flex; justify-content: space-between; gap: 30px; flex-wrap: wrap; margin-bottom: 60px;">
			<div class="contact-info-box" style="flex: 1; min-width: 250px; background: #F8F1E6; border-radius: 12px; padding: 40px 30px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
				<h3 class="contact-info-title" style="font-size: 24px; color: #F95C28; margin-bottom: 15px;"><i class="fas fa-map-marker-alt"></i> Address</h3>
				<p style="font-size: 18px; color: #222;">Denton First SDA Church <br>11010 US-HWY 377 Pilot Point, TX 76258</p>
			</div>
			<div class="contact-info-box" style="flex: 1; min-width: 250px; background: #F8F1E6; border-radius: 12px; padding: 40px 30px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
				<h3 class="contact-info-title" style="font-size: 24px; color: #F95C28; margin-bottom: 15px;"><i class="fas fa-phone"></i> Phone</h3>
				<p style="font-size: 18px; color: #222;">+1 (940) 488 9656</p>
			</div>
			<div class="contact-info-box" style="flex: 1; min-width: 250px; background: #F8F1E6; border-radius: 12px; padding: 40px 30px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
				<h3 class="contact-info-title" style="font-size: 24px; color: #F95C28; margin-bottom: 15px;"><i class="fas fa-envelope"></i> Email</h3>
				<p style="font-size: 18px; color: #222;"> anwfhl-com@txsda.org</p>
			</div>
		</div>
	</div>
</section>

<section class="contact-form-map-section" data-scroll-section>
	<div class="container contact-form-map-container" style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start;">
		<div class="contact-form-box" style="flex: 1; min-width: 320px; background: #fff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); padding: 40px 30px;">
			<h2 class="contact-form-title" style="font-size: 36px; color: #222; font-family: 'Bebas Neue', sans-serif; margin-bottom: 20px;">Send Us a Message</h2>
			<p class="contact-form-description" style="font-size: 16px; color: #666; margin-bottom: 30px;">If you have any questions, you can contact us. Please, fill out the form below.</p>
			<form class="contact-form" action="#" method="post" style="display: flex; flex-direction: column; gap: 18px;">
				<div class="form-group">
					<input type="text" name="name" placeholder="Your Name*" required style="width: 100%; padding: 14px 16px; border-radius: 6px; border: 1px solid #dedede; font-size: 16px; margin-bottom: 10px;">
				</div>
				<div class="form-group">
					<input type="email" name="email" placeholder="Your Email*" required style="width: 100%; padding: 14px 16px; border-radius: 6px; border: 1px solid #dedede; font-size: 16px; margin-bottom: 10px;">
				</div>
				<div class="form-group">
					<input type="text" name="subject" placeholder="Subject" style="width: 100%; padding: 14px 16px; border-radius: 6px; border: 1px solid #dedede; font-size: 16px; margin-bottom: 10px;">
				</div>
				<div class="form-group">
					<textarea name="message" placeholder="Your Message*" required style="width: 100%; padding: 14px 16px; border-radius: 6px; border: 1px solid #dedede; font-size: 16px; min-height: 120px; margin-bottom: 10px;"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
			</form>
		</div>
		<div class="contact-map-box" style="flex: 1; min-width: 320px;">
			<iframe src="https://www.google.com/maps?q=11010+US-HWY+377+Pilot+Point+TX+76258&output=embed" width="100%" height="400" style="border:0; border-radius:12px; min-width: 100%; min-height: 320px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</section>

<?php
get_footer();
?>
