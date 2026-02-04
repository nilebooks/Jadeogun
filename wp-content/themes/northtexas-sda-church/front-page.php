<?php
get_header();

$about_url = ntxsda_html_url('about');
$contact_url = ntxsda_html_url('contact');
$events_url = ntxsda_html_url('events');
$youth_url = ntxsda_html_url('youth-ministry');
?>

<section class="hero-section" id="hero" data-scroll-section>
	<div class="video-background">
		<video autoplay muted loop id="hero-video">
			<source src="<?php echo esc_url(ntxsda_remote_asset('assets/video/hero-video.mp4')); ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		<div class="overlay"></div>
	</div>
	<div class="container">
		<div class="hero-content">
			<h1 class="hero-title">
				YOUR<br>
				COMMUNITY.<br>
				<span class="highlight">YOUR CHURCH.</span>
			</h1>
			<p class="hero-subtitle">A Place where you can Worship and get&nbsp;Involved</p>
			<div class="hero-buttons">
				<div class="hero-buttons-row">
					<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary">JOIN US THIS Saturday</a>
					<a href="https://www.youtube.com/channel/UC2Ha7c6bwtYnsfk1uVi3fPA" target="_blank" rel="noopener" class="btn btn-outline">WATCH LIVE</a>
				</div>
				<div class="hero-buttons-row">
					<a href="https://adventist.org/beliefs" target="_blank" rel="noopener" class="btn btn-secondary">What We Believe</a>
					<a href="https://adventist.org/identity" target="_blank" rel="noopener" class="btn btn-secondary">Who We Are</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="countdown-band">
	<p>Next service scheduled in</p>
	<div class="countdown-item">
		<div class="countdown-number" id="countdown-days">23</div>
		<div class="countdown-label">Days</div>
	</div>
	<div class="countdown-separator">:</div>
	<div class="countdown-item">
		<div class="countdown-number" id="countdown-hours">12</div>
		<div class="countdown-label">Hours</div>
	</div>
	<div class="countdown-separator">:</div>
	<div class="countdown-item">
		<div class="countdown-number" id="countdown-minutes">19</div>
		<div class="countdown-label">MINUTES</div>
	</div>
	<div class="countdown-separator">:</div>
	<div class="countdown-item">
		<div class="countdown-number" id="countdown-seconds">55</div>
		<div class="countdown-label">SECONDS</div>
	</div>
</section>

<section class="welcome-section" data-scroll-section>
	<div class="container">
		<img src="<?php echo esc_url(ntxsda_remote_asset('images/img5.JPG')); ?>" class="welcome-image" alt="Church Interior" data-scroll>
		<div class="welcome-container">
			<div class="welcome-content" data-scroll>
				<h2 class="section-title">WELCOME TO<br>NORTH TEXAS SDA CHURCH</h2>
				<p class="welcome-text">
					We are a Bible-believing community and would love to have you join our family. To
					learn more about what we believe you can visit the About Us page on this site.
					Please join us for Bible study, worship, and prayer.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="about-section" data-scroll-section>
	<div class="container">
		<div class="about-container">
			<img src="<?php echo esc_url(ntxsda_remote_asset('images/pastor1.jpg')); ?>" class="about-image" alt="North Texas SDA Church Pathfinders">
			<div class="about-content" data-scroll>
				<div class="about-header">
					<h3 class="about-subtitle">Welcome Message from Pastor</h3>
					<h2 class="about-title">Welcome to North Texas Seventh-day Adventist Church!</h2>
				</div>
				<div class="about-text">
					<p>
						We're so glad you're here. I'm Pastor Denton W. Rhone, and I warmly invite you to be
						part of a growing, Spirit-led church family where you can serve, grow, and belong. At
						NTSDA, we’re passionate about sharing Christ’s love through worship, outreach, and
						community. <br>
						Located in the heart of a thriving DFW area, we’re excited to minister to our neighbors
						and make a lasting impact together. Come worship with us—you’ll find open hearts, a
						place to grow, and a purpose to live out.
						We can’t wait to meet you!
					</p>
					<div class="about-button">
						<a href="<?php echo esc_url($about_url); ?>" class="btn btn-primary">ABOUT US</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="mvv-section" data-scroll-section>
	<div class="container">
		<div class="mvv-container" data-scroll>
			<div class="mvv-box">
				<h3 class="mvv-title">Our Mission</h3>
				<p class="mvv-text">To share the love of Christ and prepare lives for Christ's soon return.</p>
			</div>
			<div class="mvv-box">
				<h3 class="mvv-title">Our Vision</h3>
				<p class="mvv-text">A world transformed by the everlasting gospel and faithful living.</p>
			</div>
			<div class="mvv-box">
				<h3 class="mvv-title">Our Values</h3>
				<p class="mvv-text">Faith, compassion, truth, service, and Christ-centered living.</p>
			</div>
		</div>
		<div class="mvv-welcome">
			<h3 class="mvv-welcome-text">You're always welcome here.</h3>
		</div>
	</div>
</section>

<section class="ministries-section" id="ministry" data-scroll-section>
	<div class="container">
		<div class="section-header" data-scroll>
			<h2 class="section-title">OUR MINISTRIES</h2>
		</div>
		<div class="ministries-container" data-scroll>
			<div class="ministry-card">
				<div class="ministry-image">
					<img src="https://abwe.org/wp-content/uploads/2022/11/iStock_000056350654_Large.jpg" alt="Children's Ministry">
					<div class="ministry-overlay"></div>
					<h3 class="ministry-title">Children's Ministry</h3>
					<a href="<?php echo esc_url($youth_url . '#children'); ?>" class="ministry-link">LEARN MORE <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<div class="ministry-card">
				<div class="ministry-image">
					<img src="https://images.squarespace-cdn.com/content/v1/5994ec6815d5dbf4b89febba/1507521082457-XT95DDFMZBCX9V47R2LG/lightstock_263873_small_user_43205821.jpg" alt="Life Groups">
					<div class="ministry-overlay"></div>
					<h3 class="ministry-title">Life Groups</h3>
					<a href="<?php echo esc_url($youth_url . '#life-groups'); ?>" class="ministry-link">LEARN MORE <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<div class="ministry-card" data-scroll-delay="0.3">
				<div class="ministry-image">
					<img src="https://b3762123.smushcdn.com/3762123/wp-content/uploads/2024/08/schoolClimate.jpg?lossy=2&strip=1&webp=1" alt="Youth Ministry">
					<div class="ministry-overlay"></div>
					<h3 class="ministry-title">Youth Ministry</h3>
					<a href="<?php echo esc_url($youth_url . '#youth'); ?>" class="ministry-link">LEARN MORE <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<div class="ministry-card" data-scroll-delay="0.4">
				<div class="ministry-image">
					<img src="https://cf2.gatewaypeople.com/production/fae/image/asset/6441/gatewayworship_webbanner.jpg" alt="Worship Ministry">
					<div class="ministry-overlay"></div>
					<h3 class="ministry-title">Worship Ministry</h3>
					<a href="<?php echo esc_url($youth_url . '#worship'); ?>" class="ministry-link">LEARN MORE <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
		<div class="section-button">
			<a href="<?php echo esc_url($youth_url); ?>" class="btn btn-primary">ALL MINISTRIES</a>
		</div>
	</div>
</section>

<section class="modern-events-section" data-scroll-section>
	<div class="container">
		<div class="modern-events-header" data-scroll>
			<h2 class="modern-events-title">UPCOMING<br>EVENTS</h2>
			<p class="modern-events-subtitle">
				Stay connected with what's happening at North Texas SDA Church! From worship nights
				and Bible studies to outreach programs and fellowship gatherings, there's always
				something for everyone.
			</p>
		</div>
		<div class="modern-events-container" data-scroll>
			<div class="modern-event-card">
				<div class="modern-event-left">
					<div class="modern-event-date">
						<span class="modern-event-day-name">SAT</span>
						<span class="modern-event-day">15</span>
						<span class="modern-event-month">JUN</span>
					</div>
				</div>
				<div class="modern-event-image">
					<img src="https://blog.ronniefloyd.com/wp-content/uploads/Preaching.png" alt="Community Service Day">
				</div>
				<div class="modern-event-content">
					<h3 class="modern-event-title">Community Service Day</h3>
					<p class="modern-event-description">Join us as we serve our local community through various outreach projects. This is a great opportunity to make a positive impact and share God's love in practical ways.</p>
					<div class="modern-event-details">
						<p class="modern-event-time">JUN 15 @ 9:00 AM - 2:00 PM</p>
					</div>
				</div>
				<div class="modern-event-action">
					<a href="<?php echo esc_url($events_url); ?>" class="modern-event-button">VIEW DETAILS</a>
				</div>
			</div>
			<div class="modern-event-card">
				<div class="modern-event-left">
					<div class="modern-event-date">
						<span class="modern-event-day-name">SAT</span>
						<span class="modern-event-day">22</span>
						<span class="modern-event-month">JUN</span>
					</div>
				</div>
				<div class="modern-event-image">
					<img src="https://imageio.forbes.com/specials-images/imageserve/65ad49201b8a4682439df59f/0x0.jpg?format=jpg&height=900&width=1600&fit=bounds" alt="Youth Concert">
				</div>
				<div class="modern-event-content">
					<h3 class="modern-event-title">Youth Concert</h3>
					<p class="modern-event-description">An evening of inspiring music and worship led by our talented youth. Come enjoy uplifting performances and fellowship with our church family.</p>
					<div class="modern-event-details">
						<p class="modern-event-time">JUN 22 @ 5:00 PM - 7:00 PM</p>
					</div>
				</div>
				<div class="modern-event-action">
					<a href="<?php echo esc_url($events_url); ?>" class="modern-event-button">VIEW DETAILS</a>
				</div>
			</div>
			<div class="modern-event-card">
				<div class="modern-event-left">
					<div class="modern-event-date">
						<span class="modern-event-day-name">MON</span>
						<span class="modern-event-day">01</span>
						<span class="modern-event-month">JUL</span>
					</div>
				</div>
				<div class="modern-event-image">
					<img src="https://i.swncdn.com/media/950w/via/images/2023/11/14/33591/33591-cms-size-3_source_file.jpg" alt="Bible Study Series">
				</div>
				<div class="modern-event-content">
					<h3 class="modern-event-title">Bible Study Series</h3>
					<p class="modern-event-description">Dive deeper into God's Word with our new Bible study series. Each session explores key biblical teachings and provides practical applications for daily living.</p>
					<div class="modern-event-details">
						<p class="modern-event-time">JUL 1 @ 7:00 PM - 8:30 PM</p>
					</div>
				</div>
				<div class="modern-event-action">
					<a href="<?php echo esc_url($events_url); ?>" class="modern-event-button">VIEW DETAILS</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="featured-sermons-section" data-scroll-section>
	<div class="container">
		<div class="featured-sermons-label">FEATURED SERMONS</div>
		<h2 class="featured-sermons-title">FEATURED SERMONS</h2>
		<div class="featured-sermons-container">
			<div class="featured-sermon-card">
				<div class="featured-sermon-thumbnail">
					<img src="https://images.squarespace-cdn.com/content/v1/5843ab37e6f2e16ba63fa175/1489184542191-OK4AAAYZ768ER75BLNN2/Header+-+04+Worship.jpg?format=1500w" alt="Welcome to the Family of God">
				</div>
				<div class="featured-sermon-date">FEBRUARY 20, 2025</div>
				<h3 class="featured-sermon-title">Welcome to the Family of God</h3>
				<div class="featured-sermon-author">
					<div class="featured-sermon-author-image">
						<img src="<?php echo esc_url(ntxsda_remote_asset('images/logo.png')); ?>" alt="Logo">
					</div>
					<div class="featured-sermon-author-name">cmsmasters</div>
				</div>
			</div>
			<div class="featured-sermon-card">
				<div class="featured-sermon-thumbnail">
					<img src="https://blog.cph.org/hubfs/_blogs/CPH_blog/Read/2020/03/5-Prayers-Times-Turmoil.jpg" alt="The Power of Prayer: Connecting with God Daily">
				</div>
				<div class="featured-sermon-date">FEBRUARY 18, 2025</div>
				<h3 class="featured-sermon-title">The Power of Prayer: Connecting with God Daily</h3>
				<div class="featured-sermon-author">
					<div class="featured-sermon-author-image">
						<img src="<?php echo esc_url(ntxsda_remote_asset('images/logo.png')); ?>" alt="Pastor">
					</div>
					<div class="featured-sermon-author-name">cmsmasters</div>
				</div>
			</div>
			<div class="featured-sermon-card">
				<div class="featured-sermon-thumbnail">
					<img src="https://www.mountcarmelblessedsacrament.com/wp-content/uploads/2020/05/EMPOWERING-BOTTOM.jpg" alt="Living with Purpose: God's Plan for Your Life">
				</div>
				<div class="featured-sermon-date">FEBRUARY 16, 2025</div>
				<h3 class="featured-sermon-title">Living with Purpose: God's Plan for Your Life</h3>
				<div class="featured-sermon-author">
					<div class="featured-sermon-author-image">
						<img src="<?php echo esc_url(ntxsda_remote_asset('images/logo.png')); ?>" alt="Pastor">
					</div>
					<div class="featured-sermon-author-name">cmsmasters</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="countdown-section" data-scroll-section>
	<div class="countdown-background"></div>
	<div class="countdown-overlay"></div>
	<div class="countdown-container">
		<h2 class="countdown-title">Don't miss the next service</h2>
		<div class="countdown-timer">
			<div class="countdown-item">
				<div class="countdown-number" id="countdown-section-days">23</div>
				<div class="countdown-label">DAYS</div>
			</div>
			<div class="countdown-separator">:</div>
			<div class="countdown-item">
				<div class="countdown-number" id="countdown-section-hours">12</div>
				<div class="countdown-label">HOURS</div>
			</div>
			<div class="countdown-separator">:</div>
			<div class="countdown-item">
				<div class="countdown-number" id="countdown-section-minutes">19</div>
				<div class="countdown-label">MINUTES</div>
			</div>
			<div class="countdown-separator">:</div>
			<div class="countdown-item">
				<div class="countdown-number" id="countdown-section-seconds">55</div>
				<div class="countdown-label">SECONDS</div>
			</div>
		</div>
		<a href="<?php echo esc_url($contact_url); ?>" class="countdown-button">JOIN US THIS SATURDAY</a>
	</div>
</section>

<section class="leadership-section" id="leadership" data-scroll-section>
	<div class="container">
		<div class="leadership-header" data-scroll>
			<span class="leadership-label">LEADING WITH LOVE</span>
			<h2 class="leadership-title">MEET OUR PASTORS</h2>
		</div>

		<div class="leadership-container" data-scroll>
			<div class="about-container">
				<div class="leader-card">
					<img src="<?php echo esc_url(ntxsda_remote_asset('images/pastor1.jpg')); ?>" alt="Denton Rhone" class="leader-image">
					<div class="leader-info">
						<h3 class="leader-name">Denton Rhone</h3>
						<p class="leader-role">Pastor</p>
					</div>
				</div>
				<div class="about-content">
					<div class="about-title">Denton Rhone</div>
					<div class="about-subtitle">Pastor</div>
					<div class="about-text">
						<p>
							Dr. Denton Rhone joined the North Texas Seventh-day Adventist Church (NTX SDA) in
							April 2024. He holds a PhD in Education &amp; Leadership and a D.Min. in Ministry &amp;
							Missions, reflecting his lifelong dedication to learning and equipping God’s people.
							Previously, he pastored the Houston International SDA Church, where he strengthened
							member engagement and ministry growth while honoring Adventist heritage. <br> <br>

							At his side is his wife, Dr. Sendy Rhone, a linguist professor whose warmth and
							mentorship enrich church ministries. Together, they are raising two energetic
							children who view the church as a place of service, learning, and joy. <br> <br>

							From youth evangelism and worship space renovations to dynamic youth programs, the
							Rhones model a faith-filled home that brings blessing and inspiration to all they
							encounter. <br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="donation-section" id="donate" data-scroll-section>
	<div class="donation-background"></div>
	<div class="container">
		<div class="donation-container">
			<div class="donation-left" data-scroll>
				<h2 class="donation-title">SUPPORT OUR MISSION</h2>
				<p class="donation-description">
					Your generosity helps us serve our community, support missions, and
					continue sharing the message of hope. Whether you give once or set
					up recurring donations, every contribution makes a difference.
				</p>
				<a href="#" class="donation-more-link">
					VIEW MORE CAUSES
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
			<div class="donation-right" data-scroll>
				<div class="donation-card">
					<h3 class="donation-card-title">Support Our Cause</h3>
					<p class="donation-card-description">
						Help our organization by donating today! Donations go to
						making a difference for our cause.
					</p>
					<div class="donation-stats">
						<div class="donation-stat">
							<span class="donation-amount">$795</span>
							<span class="donation-label">Raised</span>
						</div>
						<div class="donation-stat">
							<span class="donation-amount">12</span>
							<span class="donation-label">Donations</span>
						</div>
						<div class="donation-stat">
							<span class="donation-amount">$1,000</span>
							<span class="donation-label">Goal</span>
						</div>
					</div>
					<div class="donation-progress">
						<div class="donation-progress-bar"></div>
						<div class="donation-progress-labels">
							<span class="donation-progress-min">$195 amount</span>
							<span class="donation-progress-max">$1,000 amount</span>
						</div>
					</div>
					<a href="https://adventistgiving.org/donate/ANWFHL" class="donation-button" target="_blank" rel="noopener">
						Donate now
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
					<div class="donation-secure">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 2L4 5V11.09C4 16.14 7.41 20.85 12 22C16.59 20.85 20 16.14 20 11.09V5L12 2Z" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>100% Secure Donation</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="news-section" data-scroll-section>
	<div class="container">
		<div class="news-header" data-scroll>
			<span class="news-label">STAY INFORMED</span>
			<h2 class="news-title">ADVENTIST NEWS</h2>
			<p class="news-subtitle">Stay updated with the latest news from the Adventist community</p>
		</div>

		<div class="news-container" data-scroll>
			<div class="news-block">
				<div class="news-block-header">
					<h3 class="news-block-title">Adventist News</h3>
					<a href="https://adventist.news/" target="_blank" rel="noopener" class="news-source-link">
						<i class="fas fa-external-link-alt"></i>
					</a>
				</div>
				<div class="news-items" id="adventist-news">
					<div class="news-loading">
						<i class="fas fa-spinner fa-spin"></i>
						<span>Loading news...</span>
					</div>
				</div>
			</div>

			<div class="news-block">
				<div class="news-block-header">
					<h3 class="news-block-title">NAD Adventist</h3>
					<a href="https://www.nadadventist.org/news" target="_blank" rel="noopener" class="news-source-link">
						<i class="fas fa-external-link-alt"></i>
					</a>
				</div>
				<div class="news-items" id="nad-news">
					<div class="news-loading">
						<i class="fas fa-spinner fa-spin"></i>
						<span>Loading news...</span>
					</div>
				</div>
			</div>

			<div class="news-block">
				<div class="news-block-header">
					<h3 class="news-block-title">Texas Adventist</h3>
					<a href="https://texasadventist.org/news/" target="_blank" rel="noopener" class="news-source-link">
						<i class="fas fa-external-link-alt"></i>
					</a>
				</div>
				<div class="news-items" id="texas-news">
					<div class="news-loading">
						<i class="fas fa-spinner fa-spin"></i>
						<span>Loading news...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--
<section class="get-involved-section" id="get-involved" data-scroll-section>
	<div class="container">
		<h2 class="get-involved-title">GET INVOLVED TODAY</h2>
		<p class="get-involved-description">
			Faith is meant to be lived out in community! Discover ways to connect, serve, and grow with us.
		</p>
	</div>
</section>
-->

<section class="faq-section" id="faq" data-scroll-section>
	<div class="container">
		<div class="faq-container">
			<div class="faq-left" data-scroll>
				<span class="faq-label">SEEK. LEARN. GROW.</span>
				<h2 class="faq-title">FREQUENTLY ASKED QUESTIONS</h2>
				<a href="<?php echo esc_url($contact_url); ?>" class="faq-contact">
					CONTACT FOR MORE
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>

			<div class="faq-right">
				<ul class="faq-list">
					<li class="faq-item active">
						<div class="faq-question">
							<span class="faq-question-text">What are your gatherings like?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							First, we must understand church is not a building, a Sabbath school class, or a
							service time. According to scripture, a church gathering is a group of people coming
							together in Christ and the people are the church. Jesus shows us in Matthew 18 that
							a gathering can be as little as two people together.
						</div>
					</li>
					<li class="faq-item">
						<div class="faq-question">
							<span class="faq-question-text">What happens when I visit?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							When you visit, you'll be warmly welcomed by our greeting team. Our service includes
							worship music, prayer, and a relevant message from the Bible. After the service, we
							invite you to stay for refreshments and to meet our community.
						</div>
					</li>
					<li class="faq-item">
						<div class="faq-question">
							<span class="faq-question-text">What should I bring?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							Just bring yourself! If you have a Bible, feel free to bring it, but we also provide
							Bibles and have scripture displayed during the service. We also have a mobile app
							where you can follow along with the message and take notes.
						</div>
					</li>
					<li class="faq-item">
						<div class="faq-question">
							<span class="faq-question-text">How should I dress?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							We have no dress code. Some people come in suits, others in jeans and t-shirts. We
							care more about you being here than what you wear. Come as you are and feel
							comfortable!
						</div>
					</li>
					<li class="faq-item">
						<div class="faq-question">
							<span class="faq-question-text">Can I invite people to come with?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							Absolutely! We encourage you to invite friends, family, neighbors, or colleagues.
							Our church is open to everyone, and we love welcoming new people into our community.
						</div>
					</li>
					<li class="faq-item">
						<div class="faq-question">
							<span class="faq-question-text">What if we didn't answer your question?</span>
							<span class="faq-icon"></span>
						</div>
						<div class="faq-answer">
							If you have any other questions, please don't hesitate to reach out. You can contact
							us through our website, email, or phone. Our team is always happy to help and
							provide any information you need.
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
