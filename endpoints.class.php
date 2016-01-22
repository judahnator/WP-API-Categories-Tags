<?php

class ct_endpoints {
	
	public function __construct() {
		register_rest_route('e_categories/v1','/e_categories/(?P<id>\d+)',array(
			'methods' => 'GET',
			'callback' => array($this,'e_categories'),
		));
		register_rest_route('e_tags/v1','/e_tags/(?P<id>\d+)',array(
			'methods' => 'GET',
			'callback' => array($this,'e_tags'),
		));
	}
	
	public function e_categories(WP_REST_Request $request) {
		// TODO this
	}
	public function e_tags(WP_REST_Request $request) {
		// TODO this
	}
}