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
	<div class="container">
		<div class="posts-content">
			<?php display_year_buttons(get_queried_object()->name); ?>
			<?php
			$args = curent_setting_args();
			$queried_object_name = get_queried_object()->name;
			$args['post_type'] = $queried_object_name;
			$query = new WP_Query($args);
			if ($query->have_posts()) { ?>
				<div id="post-list">
					<?php
					$post_count = 0;
					while ($query->have_posts()) {
						$query->the_post();
						$class = ($post_count == 0) ? ' active' : '';
						// Include the class with the template part
						get_template_part('template-parts/content', get_queried_object()->name, array('class' => $class));
						$post_count++;
					} ?>
				</div>
				<?php
				if ($query->found_posts > 1) {
					echo '<div class="load-more-wrap">
						<a href="#" id="loadMorePostMyLord">Załaduj więcej</a>
					</div>';
				} ?>

			<?php } else {
				// If no posts are found, load the template part for displaying no posts available
				echo "<h2>Nie mamy tutaj jeszcze dokumentów!</h2>";
			}
			?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
