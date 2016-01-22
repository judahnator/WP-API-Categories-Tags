<?php
/*
 Plugin Name: WP API Categories+Tags
 Plugin URI: http://servercanyon.com
 Description: This plugin allows users to create and view posts via the REST API, and include categories and posts in the query and response
 Author: judahnator
 Author URI: http://servercanyon.com/
 */

if (!defined('CT_DIR')) {
	define('CT_DIR',plugin_dir_path(__FILE__));
}

add_action('rest_api_init',function() {
	require_once CT_DIR."/posts.class.php";
	$ct_posts = new ct_posts;
});
