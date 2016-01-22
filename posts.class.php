<?php

class ct_posts {
	
	private $categories;
	
	public function __construct() {
		$this->categories = array();
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
	
	/**
	 * For an input $category, returns either $category or the ID of
	 * the category if it exists. If not, creats category and returns ID
	 * @param unknown $category
	 */
	private function category_id($category=NULL) {
		if (empty($this->categories)) {
			$this->categories = get_categories();
		}
		if (is_null($category)) {
			return false;
		}
		foreach ($this->categories as $cat_data) { // if category is name or slug
			if ($category == $cat_data['name'] || $category == $cat_data['slug']) {
				return $cat_data['term_id'];
			}
		}
		foreach ($this->categories as $cat_data) { // if category is ID of category
			if ($category == $cat_data['term_id']) {
				return $cat_data['term_id'];
			}
		}
		$new_category = wp_create_category($category);
		if ($new_category === 0) {
			return false;
		}else {
			return $new_category;
		}
	}
	
}