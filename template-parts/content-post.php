<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
$class = $args['class'] ?? ''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<h2><?php echo remove_private_prefix_from_title(get_the_title()); ?></h2>
	<div id="shortText"><?php echo  get_the_excerpt(); ?></div>
	<div id="fullText" style="display:none;"><?php echo  get_the_content(); ?></div>
	<a href="#" id="toggleButton">Rozwiń</a>
</article><!-- #post-<?php the_ID(); ?> -->