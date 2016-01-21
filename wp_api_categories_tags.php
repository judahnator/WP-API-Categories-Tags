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
		'e_categories',
		array(
			'get_callback'    => 'e_get_categories',
			'update_callback' => 'e_update_categories',
			'schema'          => null,
		)
	);
	register_rest_field('post',
		'e_tags',
		array(
			'get_callback'    => 'e_get_tags',
			'update_callback' => 'e_update_tags',
			'schema'          => null,
		)
	);
});
function e_get_categories($object,$field_name,$request) {
	return wp_get_post_categories($object['id']);
}
function e_update_categories($value,$object,$field_name) {
	return;
}
function e_get_tags($object,$field_name,$request) {
	return wp_get_post_tags($object['id']);
}
function e_update_tags($value,$object,$field_name) {
	return;
}