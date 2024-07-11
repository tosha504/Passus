<?php

/**
 * Template part for displaying
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php echo  get_the_title(); ?></h2>
	<p><?php echo  get_the_content(); ?></p>
</article><!-- #post-<?php the_ID(); ?> -->