<?php 
/* 
Driver 		: mysqli
Author 		: Tom Richard
Copyright   : 2017 - 2019
-----------------------------------------------------------
**/
namespace Pusaka\Database;

class QueryBuilder {

	private $db;
	private $modesql;
	private $select;
	private $where;
	private $query;
	private $mode;

	function __construct($db) {
		$this->modesql 	= False;
		$this->db 		= $db;
	}

	// function select($params) {
	// 	$Blueprint = "SELECT %fields% FROM %table%";
	// 	$sql = "SELECT ";
	// 	return $this;
	// }

	// function from($table) {

	// } 

	// function where() {
	// }

	// function get() {
	// 	return "";
	// }

	function subQuery($query)	{
		$this->mode = "subQuery";
		if($query!="") {
			$this->query = "(".$query.")";
		}
		return $this;
	}

	function get() {
		if($this->mode=="subQuery") {
			return $this->query;
		}else {
			return "";
		}
	}

}