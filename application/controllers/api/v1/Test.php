<?php
require APPPATH . '/libraries/REST_Controller.php';
//use application\Libraries\REST_Controller;
class Test extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
	}
	function index_get(){
		$this->response(array('a'=>1), 200);
	}
}
