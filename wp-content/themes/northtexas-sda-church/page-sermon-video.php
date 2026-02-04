<?php
get_header();

$sermons_url = ntxsda_html_url('sermons');
?>

<section class="sermon-video-section" data-scroll-section>
	<div class="container">
		<div class="back-button-container">
			<a href="<?php echo esc_url($sermons_url); ?>" class="back-button">
				<i class="fas fa-arrow-left"></i>
				<span>Back to Sermons</span>
			</a>
		</div>

		<div class="sermon-header">
			<div class="sermon-category-badge">SERMON</div>
			<h1 class="sermon-title" id="sermon-title">Loading...</h1>
			<p class="sermon-description" id="sermon-description">Loading sermon details...</p>
			<div class="sermon-meta">
				<div class="sermon-meta-item">
					<i class="fas fa-user"></i>
					<span id="sermon-preacher">Loading...</span>
				</div>
				<div class="sermon-meta-item">
					<i class="fas fa-calendar"></i>
					<span id="sermon-date">Loading...</span>
				</div>
			</div>
		</div>

		<div class="video-container">
			<div class="video-wrapper">
				<iframe id="sermon-video"
					src=""
					title="Sermon Video"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
					allowfullscreen>
				</iframe>
			</div>
		</div>

		<div class="related-sermons">
			<h3 class="related-title">More Sermons</h3>
			<div class="related-sermons-grid" id="related-sermons">
				<!-- Related sermons will be loaded here -->
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
