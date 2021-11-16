<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class {{table_name_ucfirst}} extends Pusaka_Controller {

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
			//'entities/{{table_name_lcall}}'
		];
	}

	public function __construct() 
	{
		/*
		* $pagevar['key']
		* $pageinfo
		*/
		$this->page 		= 'datatables/master/{{table_name_lcall}}';
		parent::__construct();
	}

	public function index() 
	{

		$this->newLib('datatable', ['']);

		$DataTable 	= new PusakaDatatable('{{table_name}}'); 

		$Attributes = array(
			{{table_column}}
		);
		
		//FOR MANUAL QUERY
		// $DataTable->setQuery(
		//     "SELECT workgroup_id AS workgroup FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// ,
		//     "SELECT count(workgroup_id) AS COUNT FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// );
		$DataTable->setAttribute($Attributes, "{{table_name}}");
		$DataTable->auto();
		// //FOR MANUAL QUERY
		// //$DataTable->manual();
		// $DataTable->debug();
		$DataTable->setOrder(["{{first_column}}"=>"ASC"]);
		$DataTable->setLimit(20);
		//$DataTable->setWhereClause("period_status='onprocess'");
		$DataTable->response();
		
	}

} // end class