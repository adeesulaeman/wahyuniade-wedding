<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sodetail extends Pusaka_Controller {

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
			//'entities/sodetail'
		];
	}

	public function __construct() 
	{
		/*
		* $pagevar['key']
		* $pageinfo
		*/
		$this->page 		= 'datatables/master/sodetail';
		parent::__construct();
	}

	public function index() 
	{

		$this->newLib('datatable', ['']);

		$DataTable 	= new PusakaDatatable('SoDetail'); 

		$Attributes = array(
			'SalesOrder' => 'SalesOrder'
,'Line' => 'Line'
,'StockCode' => 'StockCode'
,'Description' => 'Description'
,'SerialNumberType' => 'SerialNumberType'
,'WarehouseCode' => 'WarehouseCode'
,'OrderQty' => 'OrderQty'
,'DeliveryQty' => 'DeliveryQty'
,'ReturnQty' => 'ReturnQty'
,'QtyAvailable' => 'QtyAvailable'
,'QtyOptional' => 'QtyOptional'
,'SellingPrice' => 'SellingPrice'
,'PriceCode' => 'PriceCode'
,'PriceCodeValue' => 'PriceCodeValue'
,'CurrentPrice' => 'CurrentPrice'
,'UOM' => 'UOM'
,'Cost' => 'Cost'
,'OrderTotal' => 'OrderTotal'
,'CostTotal' => 'CostTotal'
,'DiscFlag' => 'DiscFlag'
,'DiscPersen' => 'DiscPersen'
,'DiscAmount' => 'DiscAmount'
,'DiscValue' => 'DiscValue'
,'OrderAfterDisc' => 'OrderAfterDisc'
,'Commission' => 'Commission'
,'AddOn' => 'AddOn'
,'ArCategory' => 'ArCategory'
,'ArType' => 'ArType'
,'Notes' => 'Notes'
,'Reference1' => 'Reference1'
,'Reference2' => 'Reference2'
,'Reference3' => 'Reference3'
,'TimeStamp' => 'TimeStamp'

		);
		
		//FOR MANUAL QUERY
		// $DataTable->setQuery(
		//     "SELECT workgroup_id AS workgroup FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// ,
		//     "SELECT count(workgroup_id) AS COUNT FROM hrmpayroll_workgroup
		//     WHERE 1 {(search)}"
		// );
		$DataTable->setAttribute($Attributes, "SoDetail");
		$DataTable->auto();
		// //FOR MANUAL QUERY
		// //$DataTable->manual();
		// $DataTable->debug();
		$DataTable->setOrder(["SalesOrder"=>"ASC"]);
		$DataTable->setLimit(20);
		//$DataTable->setWhereClause("period_status='onprocess'");
		$DataTable->response();
		
	}

} // end class