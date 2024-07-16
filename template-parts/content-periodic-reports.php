<?php

/**
 * Template part for displaying
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passus
 */
$items = get_field('items', get_the_ID());
$class = $args['class'] ?? ''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<h2><?php echo remove_private_prefix_from_title(get_the_title()); ?></h2>
	<div class="content">
		<div class="content__content">
			<?php echo get_the_content(); ?>
		</div>
		<?php if (!empty($items) && count($items)) { ?>
			<ul class="download-item">
				<?php foreach ($items as $key => $item) {
					$link = $item['item'];
					if ($link) {
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>
						<li><?php echo $link_title; ?><a href="<?php echo esc_url($link_url); ?>" class="download" target="<?php echo esc_attr($link_target); ?>">Pobierz</a></li>
					<?php } ?>
				<?php } ?>
			</ul>
		<?php } ?>
	</div>

</article>
<!-- #post-<?php the_ID(); ?> -->