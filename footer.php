<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package passus
 */

//general
$logo_footer = get_field('logo_footer', 'options_footer');
$addres = !empty(get_field('addres', 'options_footer')) ? '<div class="footer__general_addres">' . get_field('addres', 'options_footer') . '</div>' : '';
$contact = get_field('contact', 'options_footer') ? '<div class="footer__general_contact">' . get_field('contact', 'options_footer') . '</div>' : '';

//investor

$zone_investor_title = get_field('zone_investor_title', 'options_footer') ? '<h6>' . get_field('zone_investor_title', 'options_footer') . '</h6>' : '';;
$zone_investor_referrals = get_field('zone_investor_referrals', 'options_footer');

//divisions_group
$divisions_group = get_field('divisions_group', 'options_footer');

// footer_bottom_rights
$footer_bottom_rights = !empty(get_field('footer_bottom_rights', 'options_footer')) ? '<p class="footer__bottom_rights">© ' . date("Y") . get_field('footer_bottom_rights', 'options_footer') . '</p>' : '';
$polices = get_field('polices', 'options_footer'); ?>
<footer id="colophon" class="footer">
	<div class="container">
		<div class="footer__general">
			<?php echo "<div class='footer__general_img'>";
			my_custom_attachment_image(get_field('logo_footer', 'options_footer'));
			echo  "</div>" . $addres . $contact; ?>
		</div>
		<div class="footer__wrap-inwestor">
			<div class="footer__investor">
				<?php echo $zone_investor_title;
				if (!empty($zone_investor_referrals) && count($zone_investor_referrals) > 0) { ?>
					<div class="footer__investor_items">
						<?php foreach ($zone_investor_referrals as $key => $referral) {
							if ($referral) {
								$link_url = $referral['odnosnik']['url'];
								$link_title = $referral['odnosnik']['title'];
								$link_target = $referral['odnosnik']['target'] ? $link['target'] : '_self'; ?>
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php }
						} ?>
					</div>
				<?php } ?>
			</div>
			<?php
			if (!empty($divisions_group) && count($divisions_group) > 0) {
				foreach ($divisions_group as $key => $group) {
					if (count(array_filter($group["departments"])) > 0) { ?>
						<div class="footer__investor">
							<?php print(!empty($group["departments"]["departments_title"]) ? '<h6>' . $group["departments"]["departments_title"] . '</h6>' :
								'');
							if (!empty($group["departments"]["departments_elements"]) && count($group["departments"]["departments_elements"])) { ?>
								<div class="footer__investor_items">
									<?php foreach ($group["departments"]["departments_elements"] as $key => $group_item) {
										if ($group_item["link"]) {
											$link_url = $group_item["link"]['url'];
											$link_title = $group_item["link"]['title'];
											$link_target = $group_item["link"]['target'] ? $link['target'] : '_self'; ?>
											<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php print(!empty($group_item["icon"]) ? my_custom_attachment_image($group_item["icon"])  : "");
												echo esc_html($link_title); ?></a>
									<?php }
									}
									?>
								<?php } ?>
								</div>
						</div>
					<?php } ?>
			<?php }
			} ?>
		</div>
		<div class="footer__bottom">
			<?php echo $footer_bottom_rights;
			if (!empty($polices) && count($polices) > 0) { ?>
				<div class="footer__bottom_polices">
					<?php foreach ($polices as $key => $police) {
						if ($police["link"]) {
							$link_url = $police["link"]['url'];
							$link_title = $police["link"]['title'];
							$link_target = $police["link"]['target'] ? $link['target'] : '_self'; ?>
							<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php print(!empty($group_item["icon"]) ? my_custom_attachment_image($group_item["icon"])  : "");
								echo esc_html($link_title); ?></a>
					<?php }
					} ?>
				</div>
			<?php } ?>
		</div>
	</div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>