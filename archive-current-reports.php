<?php

/**
 * The template for displaying custom-archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */

get_header();
$calendar_descr = get_field('descr', 'options');
$background =  !empty(get_field('bg_image_current_arch', 'options')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image', 'options')) . ');"' : ''; ?>

<main id="primary" class="site-main">
	<div class="archive-header-ps" <?php echo $background; ?>>
		<div class="container">
			<?php
			the_archive_title('<h1 class="archive-header__title">', '</h1>');
			echo '<p>' . $calendar_descr . '</p>'; ?>
		</div>
	</div>


	<?php
	// Setup WP_Query parameters
	$args = array(
		'post_type' => 'current-reports',  // Change to your custom post type if necessary
		'posts_per_page' => -1, // Retrieve all posts
	);
	// Create a new WP_Query instance
	$query = new WP_Query($args);
	if ($query->have_posts()) {

	?>
		<div class="container pisia">
			<!-- <div class="archive-body-current-reports-ps"> -->
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				get_template_part('template-parts/content', get_post_type()); ?>

			<?php }
			?>
			<!-- </div> -->
		</div>
	<?php } else {
		// If no posts are found, load the template part for displaying no posts available
		get_template_part('template-parts/content', 'none');
	}
	?>

</main><!-- #main -->

<?php
get_footer();
