<?php 
class Redirect extends CI_Controller {

	function __construct() {
		parent::__construct();
		redirect(base_url().'Home/');
	}

	function index() {
		$this->load->helper('nav');
	}

}