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
	
	public function ct_get_categories($object,$field_name,$request) {
		$return = array();
		$post_categories = wp_get_post_categories($object['id']);
		foreach ($post_categories as $category) {
			$return[] = get_category($category);
		}
		return $return;
	}
	
	public function ct_update_categories($categories,$object,$field_name) {
		wp_mail("judah@thosetechguys.org","debug info",serialize(array("object"=>$object,"categories"=>$categories)));
		if (empty($categories) || !$categories) {
			return;
		}
		return wp_set_post_categories($object->ID,$categories);
	}
	
	public function ct_get_tags($object,$field_name,$request) {
		return wp_get_post_tags($object['id']);
	}
	
	public function ct_update_tags($tags,$object,$field_name) {
		if (empty($tags) || !tags) {
			return;
		}
		return wp_set_post_tags($object->ID,$tags);
	}
	
}