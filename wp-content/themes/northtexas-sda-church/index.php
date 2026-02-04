<?php
get_header();
?>

<main class="container" style="padding: 140px 0 80px;">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p>No content found.</p>
	<?php endif; ?>
</main>

<?php
get_footer();
?>
