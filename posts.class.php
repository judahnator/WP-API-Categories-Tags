<?php

class ct_posts {
	
	public function __construct() {
		register_rest_field('post',
			'e_categories',
			array(
				'get_callback'    => array($this,'ct_get_categories'),
				'update_callback' => array($this,'ct_update_categories'),
				'schema'          => null,
			)
		);
		register_rest_field('post',
			'e_tags',
			array(
				'get_callback'    => array($this,'ct_get_tags'),
				'update_callback' => array($this,'ct_update_tags'),
				'schema'          => null,
			)
		);
	}
	
	function ct_get_categories($object,$field_name,$request) {
		return wp_get_post_categories($object['id']);
	}
	function ct_update_categories($value,$object,$field_name) {
		return;
	}
	function ct_get_tags($object,$field_name,$request) {
		return wp_get_post_tags($object['id']);
	}
	function ct_update_tags($tags,$object,$field_name) {
		if (empty($tags) || !tags) {
			return;
		}
		return wp_set_post_tags($object->ID,$tags);
	}
	
}