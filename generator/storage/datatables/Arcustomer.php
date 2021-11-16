<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arcustomer extends Pusaka_Controller {

	private $page;

	/*
	|--------------------------------------------------------------------
	| Extend autoloader library
	|--------------------------------------------------------------------
	|
	| digunakan untuk registrasi alias path name library
	| alias => path/folder/library/filename
	| alias yang sudah di registrasi : [ datatable ]
	| how-to-use-loader : $this->newLib('alias', $args=array())
	|
	*/
	protected function __lib() 
	{
		return [
		];
	}

	/*
	|--------------------------------------------------------------------
	| Extend autoloader language
	|--------------------------------------------------------------------
	| 
	| Digunakan untuk load language
	| -> path/folder/language/filename
	|
	*/
	protected function __lang() 
	{
		return [
			//'entities/arcustomer'
		];
	}

	public function __construct() 
	{
		/*
		* $pagevar['key']
		* $pageinfo
		*/
		$this->page 		= 'datatables/master/arcustomer';
		parent::__construct();
	}

	public function index() 
	{

		$this->newLib('datatable', ['']);

		$DataTable 	= new PusakaDatatable('ArCustomer'); 

		$Attributes = array(
			'CustomerCode' => 'CustomerCode'
,'CustomerCategory' => 'CustomerCategory'
,'CustomerName' => 'CustomerName'
,'Address1' => 'Address1'
,'City' => 'City'
,'Address2' => 'Address2'
,'PostalCode' => 'PostalCode'
,'ContactPerson' => 'ContactPerson'
,'Phone' => 'Phone'
,'Email' => 'Email'
,'TermsCode' => 'TermsCode'
,'Notes' => 'Notes'
,'Status' => 'Status'
,'AddID' => 'AddID'
,'AddDate' => 'AddDate'
,'EditID' => 'EditID'
,'EditDate' => 'EditDate'
,'TimeStamp' => 'TimeStamp'
,'Division' => 'Division'
,'Foto' => 'Foto'

		);
		
		//FOR MANUAL QUERY
		// $DataTable->setQuery(
		//     "SELECT workgroup_id AS workgroup FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// ,
		//     "SELECT count(workgroup_id) AS COUNT FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// );
		$DataTable->setAttribute($Attributes, "ArCustomer");
		$DataTable->auto();
		// //FOR MANUAL QUERY
		// //$DataTable->manual();
		// $DataTable->debug();
		$DataTable->setOrder(["CustomerCode"=>"ASC"]);
		$DataTable->setLimit(20);
		//$DataTable->setWhereClause("period_status='onprocess'");
		$DataTable->response();
		
	}

} // end class