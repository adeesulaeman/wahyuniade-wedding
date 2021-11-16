<?php 
class Home extends Pusaka_ControllerHome {

	/*
	abstract method
	**/
	function __lib() {
		return [];
	}

	/*
	abstract method
	**/
	function __lang() {
		return [
			//'entities/categorylv2'
		];
	}

	function __page() {
		return 'home';
	}

	function __construct() {
		parent::__construct();
	}

	function index() {
		
		
		$this->load->view($this->page, $this->vars->all());
		$this->load->helper('nav');
	}

	function actions() {

	}

	function getresponse() {

	}

}