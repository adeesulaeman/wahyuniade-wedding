<?php 
class Frcode extends Pusaka_Controller {

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
		return [];
	}

	function __page() {
		return 'tools/search';
	}

	function __construct() {
		parent::__construct();
		//$this->CheckToken();
	}

	private function __FRCodeList() {
		return [
			"SG001-( Language )" 			=> base_url().'settings/language',
			"SG002-( Period )" 				=> base_url().'settings/period',
			"ES001-( Company Code )" 		=> base_url().'companysetup/enterprisestructure/companycode',
			"ES002-( Personnel Area )" 		=> base_url().'companysetup/enterprisestructure/personnelarea',
			"ES003-( Personnel Sub Area )" 	=> base_url().'companysetup/enterprisestructure/personnelsubarea',
			"ES004-( Employee Group )" 		=> base_url().'companysetup/enterprisestructure/employeegroup',
			"ES005-( Employee Sub Group )" 	=> base_url().'companysetup/enterprisestructure/employeesubgroup',
			"ES006-( Payroll Area )" 		=> base_url().'companysetup/enterprisestructure/payrollarea',
		];
	}

	function index() {

		$FRCode 		= isset($_POST['FRCode'])?$_POST['FRCode']:'';

		$FRCodeList		= $this->__FRCodeList();

		$response 		= [
			"errno"	 	=> 0,
			"error"	 	=> '',
			"redirect"	=> ''
		];

		//$segments 		= explode('-', $FRCode);

		//$FRCode 		= $segments[0];

		if(!isset($FRCodeList[$FRCode])) {
			$response["errno"] 		= 2100;
			$response["error"]		= "Code not found ! ";
		}else {
			$response["redirect"]	= $FRCodeList[$FRCode];
		}

		header('Content-Type: application/json');
		echo json_encode($response);

	}

	function list() {

		$FRCodeList		= $this->__FRCodeList();
		$Data 			= [];

		foreach ($FRCodeList as $key => $value) {
			$Data[] = $key;
		}

		$response 		= [
			"errno"	 	=> 0,
			"error"	 	=> '',
			"data"		=> ''
		];

		$response["data"] = $Data;
		
		header('Content-Type: application/json');
		echo json_encode($response);

	}

}