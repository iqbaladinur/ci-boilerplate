<?php
require_once APPPATH . '/libraries/REST_Controller.php'; 
class Api_Controller extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
		$this->api_response_header();
	}

	private function api_response_header(){
		header("Access-Control-Allow-Origin:" . base_url());
		header("ETag:".uniqid("u_"));
	}

	private function api_set_allowed_user(){
		/* set allowed user here */
		/* cek it. if not allowed redirect to 500 page */
	}


}
