<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */

get_header();
$calendar_descr = get_field('calendar_descr', 'options');
$background =  !empty(get_field('bg_archive_image', 'options')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image', 'options')) . ');"' : ''; ?>

<main id="primary" class="site-main">
	<div class="archive-header-ps" <?php echo $background; ?>>
		<div class="container">
			<?php
			the_archive_title('<h1 class="archive-header__title">', '</h1>');
			echo '<p>' . $calendar_descr . '</p>'; ?>
		</div>
	</div>

	<div class="archive-body-ps">
		<div class="container">
			<?php
			// Setup WP_Query parameters
			$args = array(
				'post_type' => 'calendar',  // Change to your custom post type if necessary
				'posts_per_page' => -1, // Retrieve all posts
				'orderby' => 'meta_value', // Order by meta value
				'meta_key' => 'date_event_ps', // Key of the custom field to sort by
				'order' => 'ASC', // Sort in ascending order
			);
			// Create a new WP_Query instance
			$query = new WP_Query($args);
			$upcoming_events = [];
			$past_events = [];
			$today = new DateTime();

			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					$id = get_the_ID();
					$date_event_ps = get_field('date_event_ps', $id);
					$link_event = get_field('link_event', $id);
					$date_event = DateTime::createFromFormat('d.m.Y', $date_event_ps);

					if ($date_event > $today) {
						$upcoming_events[] = ['title' => get_the_title(), 'permalink' => $link_event, 'date_event' => $date_event_ps, 'terms' => wp_get_object_terms($id, 'categories-calendar', array('fields' => 'all'))];
					} else {
						$past_events[] = ['title' => get_the_title(), 'permalink' => $link_event, 'date_event' => $date_event_ps, 'terms' => wp_get_object_terms($id, 'categories-calendar', array('fields' => 'all'))];
					}
				}

				// Output upcoming events
				if (!empty($upcoming_events)) {	?>
					<h2>Aktualne i nadchodzące wydarzenia</h2>
					<div class='upcoming-events'>
						<div class='past-events__event top'>
							<div>
								<p>Data</p>
							</div>
							<div>
								<p>Wydarzenie</p>
							</div>
						</div>

						<?php
						foreach ($upcoming_events as $event) {
							$icon_categories = get_field('icon_categories', 'term_' . $event["terms"][0]->term_id); ?>
							<div class='upcoming-events__event'>
								<div>
									<p><?php echo $event['date_event']; ?></p>
								</div>
								<div>
									<p><?php echo  $event['title']; ?></p>
									<p class='cat-item'><?php echo $event["terms"][0]->name . file_get_contents(wp_get_attachment_image_url($icon_categories, 'full')); ?> </p>
									<p><a class='button' href='<?php echo $event['permalink']; ?>'>Dodaj do kalendarza</a></p>
								</div>
							</div> <?php } ?>
					</div><?php }
							// Output past events
							if (!empty($past_events)) { ?>
					<h2>Archiwum wydarzeń</h2>
					<div class='past-events'>
						<div class='past-events__event top'>
							<div>
								<p>Data</p>
							</div>
							<div>
								<p>Wydarzenie</p>
							</div>
						</div>
						<?php
								foreach ($past_events as $event) {
									$icon_categories = get_field('icon_categories_not', 'term_' . $event["terms"][0]->term_id); ?>
							<div class='past-events__event'>
								<div>
									<p><?php echo  $event['date_event']; ?></p>
								</div>
								<div>
									<p><?php echo  $event['title'] ?></p>
									<p class='cat-item'><?php echo file_get_contents(wp_get_attachment_image_url($icon_categories, 'full')) . $event["terms"][0]->name;  ?>

								</div>
							</div>
						<?php } ?>
					</div> <?php }
								/* Restore original Post Data */
								wp_reset_postdata();
							} else {
								// If no posts are found, load the template part for displaying no posts available
								get_template_part('template-parts/content', 'none');
							} ?>
		</div>

</main><!-- #main -->

<?php
get_footer();
