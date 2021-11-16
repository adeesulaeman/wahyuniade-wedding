<?php 
class Welcome extends Pusaka_Controller {

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
		return 'welcome';
	}

	function __construct() {
		parent::__construct();
		$this->CheckToken();
	}

	function index() {
		$this->load->view($this->page, $this->vars->all());
	}

	function actions() {

	}

	function getresponse() {

	}

}