<?php
namespace Pusaka\Library;

class SpreadsheetExport {

	private $workdirectory;
	private $spreadsheet;
	private $header;
	private $datasource;
	private $map;
	private $useheader;

	function __construct($workdirectory = "") {
		$this->workdirectory = $workdirectory;
		$this->useheader 	 = True;
	}

	function create() {
		$this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	}

	function setHeader(array $header) {
		$this->header = $header;
	}

	function setSource(array $datasource) {
		$this->datasource = $datasource;
	}

	function setMap(array $map) {
		$this->map = $map;
	}

	function noheader() {
		$this->useheader = False;
	}

	function save(string $name) {

		$map 	= $this->map;
		$header = $this->header;
		$source = $this->datasource;
		
		$path  	= $this->workdirectory;

		$lpath 	= substr($path, -1);

		if($lpath != '/') {
			$path .= '/';
		}

		$spreadsheet = $this->spreadsheet;

		$sheet = $spreadsheet->getActiveSheet();

		$inc   = 2;
		if(!$this->useheader) {
			$inc = 1;
			goto GenerateSource;
		}

		foreach ($header as $key => $val) {
			if(isset($map[$key])) {
				$cell = $map[$key].'1';
				$sheet->setCellValue($cell, $val);
			}
		}

		GenerateSource:

		for($i=0, $c=count($source); $i<$c; $i++) {
			foreach ($source[$i] as $key => $val) {
				if(isset($map[$key])) {
					$cell = $map[$key].($i+$inc);
					$sheet->setCellValue($cell, $val);
				}
			}
		}

		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$writer->save($path . $name . '.xlsx');
	}

}

class SpreadsheetImport {

	private $workdirectory;
	private $spreadsheet;
	private $filepath;
	private $upload;
	private $map;
	private $arraydata;
	private $start;
	private $limit;
	private $page;
	private $validation;
	private $curentvalue;
	private $curentcol;
	private $curentrow;
	private $increament;
	private $includeHeader;
	private $currentcell;
	private $currentstyle;
	private $stringCellActive;
	private $preloadfunct;
	private $preloadheader;
	private $dynamicmap;

	function __construct($workdirectory = "") {
		$this->workdirectory = $workdirectory;
		$this->arraydata 	 = array();
		$this->increament 	 = 0;
		$this->includeHeader = True;
		$this->dynamicmap 	 = False;
	}

	function upload($form) {

		if(!class_exists('\\Pusaka\\Library\\Upload')) {
			die('Import required : Pusaka\\Library\\Upload !');
		}

		$Config = [
			"upload_path" => ROOTDIR . 'storage/temp/',
			"allowed_ext" => 'xlsx',
			"max_size" 	  => Upload::getByte(5, 'MB'),
			"encrypt"	  => True
		];
		$Upload = new \Pusaka\Library\Upload($form, $Config);
		$Upload->start();

		$this->filepath = $Upload->location();

		$this->upload 	= $Upload;

	} 

	function setDataValidation(array $validation) {
		$this->validation = $validation;
	}

	function addDataValidation($key, $data) {
		$this->validation[$key] = $data;
	}

	function getDatavalidation() {

		$idx = $this->map($this->curentcol - 1);

		if(isset($this->validation[$idx])) {
			return base64_encode(json_encode($this->validation[$idx]));
		}
			
		return base64_encode(json_encode([]));
	
	}

	function valid() {

		$idx = $this->map($this->curentcol - 1);
	
			
		if($idx===NULL) {
			return true;
		}

		if(!isset($this->validation[$idx])) {
			return true;
		}

		$validation = $this->validation[$idx];

		if($validation['type']=='array') {
			if(in_array($this->curentvalue, $validation['data'])){
				return true;
			}
		}else 

		if($validation['type']=='regex') {
			$cmatch = preg_match('/'.$validation['data'].'/', $this->curentvalue);
			if($cmatch>0) {
				return true;
			}
		}

		return false;

	}

	function setMap(array $map) {
		$this->map = $map;
	}

	function map($index) {
		if(!isset($this->map[$index])) {
			return NULL;
		}
		return $this->map[$index];
	}

	function mapIs($name){
		if($this->map($this->curentcol-1)==$name) {
			return true;
		}
		return false;
	}

	function mapLike($name){
		$name 	= str_replace('%', '.*', $name);
		$curmap = $this->map($this->curentcol-1);
		$cmatch = preg_match('/'.$name.'/', $curmap);
		if($cmatch>0) {
			return true;
		}
		return false;
	}

	function stringCellActive() {
		return $this->stringCellActive;
	}

	function includeHeader(bool $status) {
		$this->includeHeader = $status;
	}	

	function dynamicmap() {
		$this->dynamicmap = True;
	}

	function increase() {
		$this->increament += 1;
	}

	function insertIntoArray($value) {
		$col = $this->curentcol-1;
		if(!isset($this->map[$col])) {
		}else {
			$val = array(
	 			"validate"	=> $this->getDataValidation(),
	 			"status" 	=> $this->valid(),
	 			"index"		=> base64_encode(json_encode([$this->increament,$this->map[$col]])),
	 			"text"		=> $value
	 		);
			$this->arraydata[$this->increament][$this->map[$col]] = $val;
		}
	}

	function getArray() {
		return $this->arraydata;
	}

	function start($start) {
		$this->start = $start;
	}

	function limit($limit) {
		$this->limit = $limit;
	}

	function page($page) {
		$this->page  = $page;
	}

	function preloadheader($funct = NULL) {
		$this->preloadheader = $funct;
	}

	function preload($funct = NULL) {
		$this->preloadfunct = $funct;
	}

	function load($funct = NULL) {

		if($funct === NULL) {
			return;
		} 

		if(file_exists($this->filepath)) {

			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($this->filepath);
			$reader->setReadDataOnly(false);
			$this->spreadsheet = $reader->load($this->filepath);

			$worksheet = $this->spreadsheet->getActiveSheet();
			
			// Get the highest row and column numbers referenced in the worksheet
			$highestRow 		= $worksheet->getHighestRow(); // e.g. 10
			$highestColumn 		= $worksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

			$start 		= 1;
			$end   		= $highestRow;
			$page  		= 0;
			$limit 		= NULL;
			$pagination = False;

			if(is_integer($this->page)) {
				$page  		= $this->page;
				$pagination = True;
			}

			if(is_integer($this->limit)) {
				$limit 		= $this->limit;
				$pagination = True;
			}

			if(is_integer($this->start)) {
				$start 		= $this->start + ($this->page * $limit) + 1;
				$pagination = True;
			}

			if($pagination) {
				$high 		= $start + $limit - 1 ;
				$end 		= ($high<$end)?$high:$end;
			}

			for ($row = $start; $row <= $end; ++$row) {
				for ($col = 1; $col <= $highestColumnIndex; ++$col) {
					
					if($row==1 AND $this->dynamicmap) {
						if(is_object($this->preloadheader)) {
							$closure = $this->preloadheader;
							$this->map[$col-1]  = $closure($col, $worksheet->getCellByColumnAndRow($col, $row)->getValue(), $this);
						}
					}

					$this->curentcol 		= $col;
					$this->curentrow 		= $row;
					$this->currentcell 		= $worksheet->getCellByColumnAndRow($col, $row);
					$this->stringCellActive = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col).$row;
					$this->currentstyle 	= $worksheet->getStyle($this->stringCellActive);

					if(is_object($this->preloadfunct)) {
						$closure = $this->preloadfunct;
						$closure($this);
					}

					$value 					= $worksheet->getCellByColumnAndRow($col, $row)->getFormattedValue();
					$this->curentvalue 		= $value;

    				$funct($row, $col, $value, $this);
				}
				if($row==1 AND !$this->includeHeader) {
					continue;
				}
				$this->increase();
			}
			
		}

		$this->upload->delete();

	}

	function getCell() {
		return $this->currentcell;
	}

	function getStyle() {
		return $this->currentstyle;
	}

}

class Spreadsheet {
	
	public $export;
	public $import;

	function __construct($workdirectory = "") {

		if(!is_dir($workdirectory)) {
			die("Directory not found");
		}
		$this->export = new SpreadsheetExport($workdirectory);
		$this->import = new SpreadsheetImport($workdirectory);
	
	}
	
}
?>