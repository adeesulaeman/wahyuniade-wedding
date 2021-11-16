<?php
namespace Pusaka\Library;

class ExcelExport {

}

class ExcelImport {

}

class Excel {
	
	public $export;
	public $import;

	function __construct() {
		$this->export = new ExcelExport();
		$this->import = new ExcelImport();
	}
	
}
?>