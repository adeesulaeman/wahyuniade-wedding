<?php 
/* 
Driver 		: mysqli
Author 		: Tom Richard
Copyright   : 2017 - 2019
-----------------------------------------------------------
**/
namespace Pusaka\Library\DataTable\Database;

class Result {

	private $result;
	private $rows;

	function __construct($result) {
		// set rows
		$this->rows = NULL;

		if($result!==NULL) {
			$this->result = $result;
		}else {
			$this->result = NULL;
		}
	}

	function close() {
		if(!is_bool($this->result)) {
			$this->result->free();
		}
	}

	function rows() {

		if($this->rows!==NULL) {
			return $this->rows;
		}

		if($this->result!==NULL AND $this->result!==false) {
			$rows = [];
			while($row = $this->result->fetch_assoc()){
				$rows[] = $row;
			}
			$this->rows = $rows;
			return $rows;
		}else {
			return array();
		}
	}

	function count() {
		if($this->result!==NULL AND $this->result!==false) {
			//$this->rows();
			return $this->result->num_rows;
		}else {
			return 0;
		}
	}

}