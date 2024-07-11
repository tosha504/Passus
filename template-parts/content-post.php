<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php echo  get_the_title(); ?></h2>
	<div id="shortText"><?php echo  get_the_excerpt(); ?></div>
	<div id="fullText" style="display:none;"><?php echo  get_the_content(); ?></div>
	<a href="#" id="toggleButton">Rozwiń</a>
</article><!-- #post-<?php the_ID(); ?> -->