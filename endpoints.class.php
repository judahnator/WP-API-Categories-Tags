<?php

class ct_endpoints {
	
	public function __construct() {
		register_rest_route('e_ct/v1','/categories/',
			array(
				'methods' => 'GET',
				'callback' => array($this,'e_categories'),
			)
		);
		register_rest_route('e_ct/v1','/categories/(?P<id>\d+)',
			array(
				'methods' => 'GET',
				'callback' => array($this,'e_categories'),
			)
		);
		register_rest_route('e_ct/v1','/tags/',
			array(
				'methods' => 'GET',
				'callback' => array($this,'e_tags'),
			)
		);
		register_rest_route('e_ct/v1','/tags/(?P<id>\d+)',
			array(
				'methods' => 'GET',
				'callback' => array($this,'e_tags'),
			)
		);
	}
	
	public function e_categories(WP_REST_Request $request) {
		$id = $request->get_param("id");
		if (empty($id)) {
			return get_categories();
		}else {
			$return = array();
			$post_categories = wp_get_post_categories($id);
			foreach ($post_categories as $category) {
				$return[] = get_category($category);
			}
			return $return;
		}
	}
	public function e_tags(WP_REST_Request $request) {
		if (empty($request->get_param("id"))) {
			return get_tags();
		}
		return wp_get_post_tags($request->get_param("id"));
	}
}