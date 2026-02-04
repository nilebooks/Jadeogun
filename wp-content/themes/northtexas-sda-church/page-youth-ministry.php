<?php
get_header();

$contact_url = ntxsda_html_url('contact');
?>

<section class="page-header" data-scroll-section>
	<div class="page-header-background" style="background-image: url('<?php echo esc_url(ntxsda_remote_asset('images/You%20Ministries.jpg')); ?>');"></div>
	<div class="container">
		<h1 class="page-title" data-scroll>YOUTH MINISTRIES</h1>
		<p class="page-subtitle" data-scroll data-scroll-delay="0.2">Empowering the next generation to grow in faith, serve with love, and lead with purpose.</p>
	</div>
</section>

<section class="youth-hero-section" data-scroll-section>
	<div class="container">
		<div class="youth-hero-content">
			<div class="youth-hero-text">
				<h2 class="section-title gradient-title">Welcome to Youth Ministries</h2>
				<p class="section-description">
					Our Youth Ministries are dedicated to helping young people discover their identity in Christ, build lasting friendships, and make a positive impact in their communities. We offer a variety of programs, events, and service opportunities designed to nurture spiritual growth, leadership, and fellowship.
				</p>
			</div>
			<div class="youth-hero-image">
				<img src="<?php echo esc_url(ntxsda_remote_asset('images/img5.JPG')); ?>" alt="Youth Ministry Group" />
			</div>
		</div>
	</div>
</section>

<section class="youth-programs-section" data-scroll-section>
	<div class="container">
		<div class="youth-programs-header">
			<h2 class="section-title">Our Programs</h2>
			<p class="section-description">Explore our core youth programs and clubs <br> designed for fun, faith, and leadership.</p>
		</div>
		<div class="youth-programs-container">
			<div class="youth-program-card">
				<img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" alt="Adventurer Club" class="youth-program-img" />
				<h3 class="youth-program-title"><a href="http://www.adventurer-club.org/" target="_blank" rel="noopener">Adventurer Club</a></h3>
				<p class="youth-program-desc">For grades 1-4. Creative activities, character-building, and fun for younger children and their families. <br><strong>Pledge:</strong> Because Jesus loves me, I will always do my best.</p>
				<ul class="adventurer-law">
					<h3>Adventurer Law</h3>
					<li>Be obedient</li><li>Be pure</li><li>Be true</li><li>Be kind</li><li>Be respectful</li><li>Be attentive</li><li>Be helpful</li><li>Be cheerful</li><li>Be thoughtful</li><li>Be reverent</li>
				</ul>
			</div>

			<div class="youth-program-card">
				<img src="<?php echo esc_url(ntxsda_remote_asset('images/Youth%20Ministries%20-%20Pathfinders.jpg')); ?>" alt="Pathfinder Club" class="youth-program-img" />
				<h3 class="youth-program-title"><a href="http://www.pathfindersonline.org/" target="_blank" rel="noopener">Pathfinder Club</a></h3>
				<p class="youth-program-desc">For ages 10-15. Enjoy adventure, camping, and service while growing in Christ. Open to all youth, regardless of background.</p>
			</div>
		</div>
	</div>
</section>

<section class="youth-invite-section" data-scroll-section>
	<div class="container">
		<div class="youth-invite-content">
			<h2 class="section-title">Want to Get Involved ?</h2>
			<p class="section-description">If you’re a young person looking for a place to belong, grow, and serve, we invite you to join us! Parents and volunteers are also welcome to support and mentor our youth.</p> <br>
			<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary">GET INVOLVE</a>
			<div class="youth-invite-imgs">
				<img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=400&q=80" alt="Youth Group Smiling" />
				<img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=400&q=80" alt="Youth Service Project" />
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
