<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * this class is example for extending cores controller and load composer library
 */

require_once APPPATH.'core/View_Controller.php';
require_once 'vendor/autoload.php';

class Home extends View_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		echo base_url();
	}
}
