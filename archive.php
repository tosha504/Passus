<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */

get_header();


?>

<main id="primary" class="site-main">

	<?php
	$args = array(
		'posts_per_page' => 3,
		'paged' => 1,
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post();
			get_template_part('template-parts/content', get_post_format());
		endwhile;
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	wp_reset_postdata(); ?>

</main><!-- #main -->

<?php
get_footer();
