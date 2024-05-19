<?php
/*
Plugin Name: Contributors
Description: Allows admin tp add list of contributors.
Version: 1.0
Author: Vishakha More
*/

class WPContributors_Meta_Box
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add'));
		add_action('save_post', array($this, 'save'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_enqueue_scripts', array($this,'enqueue_custom_styles')) ;
	}

	public static function add()
	{
		$screens = ['post'];
		foreach ($screens as $screen) {
			add_meta_box(
				'authors_list',
				'Contributors',
				[self::class, 'html'],
				$screen,
				'side'
			);
		}
	}

	public static function save($post_id)
	{
		if (isset($_POST['selected_users_ids'])) {
			update_post_meta($post_id, '_selected_users_ids', sanitize_text_field($_POST['selected_users_ids']));
		}
	}

	public static function html($post)
	{
		$selected_users_ids = get_post_meta($post->ID, '_selected_users_ids', true);
		$users = get_users(array('role__in' => array('author','admin', 'contributor')));
		echo '<label for="users">Select Users:</label><br>';

		foreach ($users as $user) {
			$checked = in_array($user->ID, explode(',', $selected_users_ids)) ? 'checked' : '';
			echo '<input type="checkbox" id="user_' . $user->ID . '" name="users[]" value="' . $user->ID . '"' . $checked . '><span> ' . $user->display_name . '</span><br>';
		}
		echo '<input type="hidden" id="selected-users-ids" name="selected_users_ids" value="">';
	}

	function enqueue_custom_styles() {
		wp_enqueue_style('contributors-style', get_template_directory_uri() . '/assets/css/contributors-style.css', array(), '1.0', 'all');
	}

	public function enqueue_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('contributors-script', get_template_directory_uri() . '/assets/js/contributors-script.js', array('jquery'), '1.0', true);
	}
}

$contributors_meta_box = new WPContributors_Meta_Box();
?>