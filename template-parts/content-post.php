<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
$calendar_descr = get_field('calendar_descr', 'options');
$background =  !empty(get_field('bg_archive_image', 'options')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image', 'options')) . ');"' : '';
?>

<div class="archive-header-ps" <?php echo $background; ?>>
	<div class="container">
		<?php
		the_archive_title('<h1 class="page-title archive-title">', '</h1>');
		// the_archive_title('<h1 class="archive-`header`__title">', '</h1>');
		echo '<p>' . $calendar_descr . '</p>'; ?>
	</div>
</div>


<div class="container">
	<div class="posts-content">
		<?php
		display_year_buttons(get_post_type()); ?>
		<div id="post-list">
			<!-- Posts will be dynamically loaded here based on the selected year -->
		</div>
	</div>
</div>