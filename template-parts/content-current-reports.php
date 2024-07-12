<?php

/**
 * Template part for displaying
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
$espi = get_field('espi', get_the_ID());
$date = new DateTime(get_the_date());
$formattedDate = $date->format('d.m.Y'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="date-cat">
		<p><?php echo $formattedDate ?></p>
		<p class="cat"><?php echo $espi; ?></p>
	</div>
	<h2><?php echo  get_the_title(); ?></h2>
	<div id="shortText"><?php echo  get_the_excerpt(); ?></div>
	<div id="fullText" style="display:none;"><?php echo  get_the_content(); ?></div>
	<a href="#" id="toggleButton">Rozwiń</a>
</article><!-- #post-<?php the_ID(); ?> -->