<?php
require_once APPPATH . '/core/Api_Controller.php'; 
class Test extends Api_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
	}
	function index_get(){
		$this->response(array('a'=>1), 400);
	}
}
