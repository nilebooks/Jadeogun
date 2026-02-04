<?php
get_header();
?>

<section class="page-header" data-scroll-section>
	<div class="page-header-background" style="background-image: url('<?php echo esc_url(ntxsda_remote_asset('images/img2.jpg')); ?>');"></div>
	<div class="container">
		<h1 class="page-title" data-scroll>SERMONS</h1>
		<p class="page-subtitle" data-scroll data-scroll-delay="0.2">Inspiring messages to strengthen your faith and deepen your relationship with God.</p>
	</div>
</section>

<section class="sermons-section" data-scroll-section>
	<div class="container">
		<div class="sermons-header">
			<span class="sermons-label">LISTEN &amp; GROW</span>
			<h2 class="sermons-title">RECENT SERMONS</h2>
			<p class="sermons-description">
				Explore our collection of sermons that offer biblical insights, practical wisdom, and spiritual encouragement for your daily life.
			</p>
		</div>

		<div class="sermons-container">
			<div class="sermon-card" data-scroll>
				<div class="sermon-thumbnail">
					<img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Sample sermon">
					<div class="sermon-play-button">
						<i class="fas fa-play"></i>
					</div>
				</div>
				<div class="sermon-details">
					<div class="sermon-date">May 4, 2025</div>
					<h3 class="sermon-title">Christ is Coming - No Surprise!</h3>
					<p class="sermon-description">Explore the biblical signs and promises of Christ's return, and how we can live in hope and readiness for His coming.</p>
					<div class="sermon-categories">
						<span class="sermon-category">Second Coming</span>
						<span class="sermon-category">Hope</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
