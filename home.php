<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */

get_header(); ?>
<main id="primary" class="site-main">

	<?php
	$args = curent_setting_args();
	$args['posts_per_page'] = -1;
	$query = new WP_Query($args);
	$calendar_descr = get_field('calendar_descr', 'options');
	$background =  !empty(get_field('bg_archive_image', 'options')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image', 'options')) . ');"' : ''; ?>

	<div class="archive-header-ps" <?php echo $background; ?>>
		<div class="container">
			<?php
			the_archive_title('<h1 class="page-title archive-title">', '</h1>');
			echo '<p>' . $calendar_descr . '</p>'; ?>
		</div>
	</div>
	<div class="container">
		<div class="posts-content">
			<?php
			display_year_buttons(get_post_type());
			if ($query->have_posts()) : ?>
				<div id="post-list">
					<?php
					$post_count = 0;
					while ($query->have_posts()) {
						$query->the_post();
						$class = ($post_count == 0) ? ' active' : '';
						// Include the class with the template part
						get_template_part('template-parts/content', get_post_type(), array('class' => $class));
						$post_count++;
					} ?>
				</div>
			<?php
			else :
				get_template_part('template-parts/content', 'none');

			endif;
			wp_reset_postdata(); ?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
