<?php
/*
 Plugin Name: WP API Categories+Tags
 Plugin URI: http://servercanyon.com
 Description: This plugin allows users to create (and maybe edit?) posts via the REST API, and include categories and posts
 Author: judahnator
 Author URI: http://servercanyon.com/
 */

add_action('rest_api_init',function() {
	register_rest_field('post',
		'e_category',
		array(
			'get_callback'    => 'e_get_category',
			'update_callback' => 'e_update_category',
			'schema'          => null,
		)
	);
});
function e_get_category($object,$field_name,$request) {
	return wp_get_post_categories($object['id']);
}
function e_update_category($value,$object,$field_name) {
	return;
}