<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

while (have_posts()):
	the_post();
	?>

	<main id="content" <?php post_class('site-main'); ?>>

		<?php if (apply_filters('hello_elementor_page_title', true)): ?>
			<header class="page-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
		<?php endif; ?>

		<div class="page-content">
			<?php the_content(); ?>
			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>

		<?php
		$post_id = get_the_ID();
		$combined_custom_field_value = get_post_meta($post_id, '_selected_users_ids', true);
		$img_url = "http://localhost/my-plugins/wp-content/uploads/2024/05/user.png";
		if (!empty($combined_custom_field_value)) {
			$individual_values = explode(',', $combined_custom_field_value);

			echo '<div class="authors-block"><h3>Authors</h3><ul>';
			foreach ($individual_values as $custom_field_value) {
				$org_value = trim($custom_field_value);
				echo '<li><img src="'. esc_url($img_url).'" alt="user"><span>' . $org_value . '</span></a></li>';
			}
			echo '</ul></div>';
		} else {
			echo '';
		}
		?>
	</main>

	<?php
endwhile;

?>