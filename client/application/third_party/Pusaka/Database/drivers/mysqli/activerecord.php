<?php 
/* 
Driver 		: mysqli
Author 		: Tom Richard
Copyright   : 2017 - 2019
-----------------------------------------------------------
**/
namespace Pusaka\Database;

class ActiveRecord {

	private $db;
	private $modesql;

	function __construct($db) {
		$this->modesql 	= False;
		$this->db 		= $db;
	}

	//-----------------------------------------------------------------------------------------
	// Insert
	function insert($table, $raw = array()) {

		if($this->db->mode=='normal') {
			if(!$this->db->isconnect()) {
				$this->db->connect();
			}
		}

		$field 	= array();
		$values = array();
		
		$temp 	= $raw;

		// set single to raw
		if(!isset($raw[0])) {
			unset($raw);
			$raw[0] = $temp; 
		}

		// set - key
		foreach ($raw[0] as $key => $value) {
			$field[] = $key;
		}
		// set - value
		foreach ($raw as $row) {
			$value 	= array();
			foreach ($row as $k => $v) {
				if(!is_string($v) AND !is_numeric($v)) {
					$err = 'error format value ! ';
					if($this->db->mode=='normal') {
						$this->db->error_msg 			= $err;
					}else
					if($this->db->mode=='transaction') {
						$this->db->error_transaction[] 	= $err;
					}
					return False;
				}
				$value[] = "'".$v."'";
			}
			$values[] = '('.implode(',', $value).')'; 
		}

		$field 	= implode(',', $field);
		$values = implode(',', $values);

		$sql 	= "INSERT INTO $table($field) VALUES $values;";

		// Mode Sql
		if($this->modesql) {
			return $sql;
		}

		// Mode Execute
		$this->db->query($sql);

		if($this->db->mode=='transaction') {
			if($this->db->driver->error != '') {
				$this->db->error_transaction[] 	= $this->db->driver->error;	
			}
		}
		return True;

	} // end method

	function sqlinsert($table, $raw = array()) {
		$this->modesql = True;
		$sql = $this->insert($table, $raw);
		$this->modesql = False;
		return $sql;
	}

	//-----------------------------------------------------------------------------------------
	// Update
	function update($table, $raw = array(), $where = "") {

		if($this->db->mode=='normal') {
			if(!$this->db->isconnect()) {
				$this->db->connect();
			}
		}

		$whereas = array();

		if(is_array($where)) {
			foreach ($where as $key => $value) {
				if(!is_string($value) AND !is_numeric($value)) {
					return False;
				}
				$whereas[] = $key.$value;
			}
			$where = 'WHERE '.implode(' AND ', $whereas);
		}

		$values = "";

		// set - value
		$value 	= array();
		foreach ($raw as $k => $v) {
			if(!is_string($v) AND !is_numeric($v)) {
				$err = 'error format value ! ';
				if($this->db->mode=='normal') {
					$this->db->error_msg 			= $err;
				}else
				if($this->db->mode=='transaction') {
					$this->db->error_transaction[] 	= $err;
				}
				return False;
			}
			$value[] = $k.' = '."'".$v."'";
		}
		$values = implode(',', $value);

		$sql 	= "UPDATE $table SET $values $where;";

		// Mode Sql
		if($this->modesql) {
			return $sql;
		}

		// Mode Execute
		$this->db->query($sql);
		
		if($this->db->mode=='transaction') {
			if($this->db->driver->error != '') {
				$this->db->error_transaction[] 	= $this->db->driver->error;	
			}
		}
		return True;

	} // end method

	function sqlupdate($table, $raw = array(), $where = "") {
		$this->modesql = True;
		$sql = $this->update($table, $raw, $where);
		$this->modesql = False;
		return $sql;
	}

	//-----------------------------------------------------------------------------------------
	// Delete
	function delete($table, $where = "") {

		if($this->db->mode=='normal') {
			if(!$this->db->isconnect()) {
				$this->db->connect();
			}
		}

		$whereas = array();

		if(is_array($where)) {
			foreach ($where as $key => $value) {
				if(!is_string($value) AND !is_numeric($value)) {
					return False;
				}
				$whereas[] = $key.$value;
			}
			$where = 'WHERE '.implode(' AND ', $whereas);
		}

		$sql 	= "DELETE FROM $table $where";

		// Mode Sql
		if($this->modesql) {
			return $sql;
		}

		// Mode Execute
		$this->db->query($sql);
		
		if($this->db->mode=='transaction') {
			if($this->db->driver->error != '') {
				$this->db->error_transaction[] 	= $this->db->driver->error;	
			}
		}
		return True;

	}

	function sqldelete($table, $where = "") {
		$this->modesql = True;
		$sql = $this->delete($table, $where);
		$this->modesql = False;
		return $sql;
	}


}