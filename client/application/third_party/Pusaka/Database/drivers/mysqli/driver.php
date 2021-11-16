<?php 
/* 
Driver 		: mysqli
Author 		: Tom Richard
Copyright   : 2017 - 2019
-----------------------------------------------------------
**/
namespace Pusaka\Database;

class Driver {

	public $driver;
	public $mode;
	private $options;
	private $result;

	public $error_transaction;

	public $error_no;
	public $error_msg;

	function __construct($hostname, $username, $password, $database, $options = array()) {
		$this->options['hostname'] = $hostname;
		$this->options['username'] = $username;
		$this->options['password'] = $password;
		$this->options['database'] = $database;
		$this->mode 			   = "normal"; // normal | transaction

		$this->error_transaction 	= array();
		$this->error_no  			= '';
		$this->error_msg 			= '';
		$this->driver 				= NULL;
	}

	/* 
	@@Param 	: 
	@@Return 	: boolean
	-----------------------------------------------------------------------
	**/
	function connect() {
		$hostname 		= $this->options['hostname'];
		$username 		= $this->options['username'];
		$password 		= $this->options['password'];
		$database 		= $this->options['database'];
		$this->driver 	= new \mysqli($hostname, $username, $password, $database);
		if(mysqli_connect_errno()) {
			die("Connect failed: ".mysqli_connect_error()."\n");
		}
		return True;
	}

	function isconnect() {
		return ($this->driver!==NULL);
	}

	function error() {
		return [
			"error_no" 	=> $this->error_no,
			"error_msg" => $this->error_msg
		];
	}

	function error_normal() {
		return ($this->error_msg!='');
	}

	function error_transaction() {
		return $this->error_transaction;
	}

	function transaction() {
		$this->driver->autocommit(FALSE);
	}

	function commit() {
		$this->driver->commit();
	}

	function rollback() {
		$this->driver->rollback();
	}

	function close() {
		if($this->driver!==NULL) {
			if(!empty($this->result)) {
				foreach ($this->result as $key => $value) {
					$this->result[$key]->close();
				}
			}
			$this->driver->close();
			$this->driver 			 = NULL;
			$this->error_transaction = NULL;
			$this->error_no 		 = NULL;
			$this->error_msg 		 = NULL;
			$this->result 			 = array();
		}
	}

	function query($query = "") {
		$result 			= $this->driver->query($query, MYSQLI_STORE_RESULT);
		$this->error_no 	= $this->driver->errno;
		$this->error_msg 	= $this->driver->error;
		$tresult 			= new Result($result);
		$this->result[]  	= $tresult;
		return $tresult;
	}

	function affected_rows() {
		return $this->driver->affected_rows;
	}

}