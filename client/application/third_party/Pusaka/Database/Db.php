<?php 
namespace Pusaka\Database;

class Db {

	private $driver;
	private $mode;

	public $execute;

	function __construct($dbconfig) {

		$this->driver = NULL;

		$dbdriver 	= (isset($dbconfig['dbdriver'])?$dbconfig['dbdriver']:'');
		$hostname   = (isset($dbconfig['hostname'])?$dbconfig['hostname']:'');
		$username	= (isset($dbconfig['username'])?$dbconfig['username']:'');
		$password 	= (isset($dbconfig['password'])?$dbconfig['password']:'');
		$database 	= (isset($dbconfig['database'])?$dbconfig['database']:'');
		$options 	= array();
		$mode 		= 'normal';
		
		$driverpath = ROOTDIR . 'application/third_party/Pusaka/Database/drivers/';

		switch($dbdriver) {
			case 'mysqli' : 
					require_once($driverpath . 'mysqli/driver.php');
					require_once($driverpath . 'mysqli/result.php');
					require_once($driverpath . 'mysqli/activerecord.php');
					$this->driver 	= new Driver($hostname, $username, $password, $database, $options);
					$this->execute  = new ActiveRecord($this->driver);
				break; 
			case 'sqlsrv' : 
					require_once($driverpath . 'sqlsrv/driver.php');
					require_once($driverpath . 'sqlsrv/result.php');
					require_once($driverpath . 'mysqli/activerecord.php');
					$this->driver 	= new Driver($hostname, $username, $password, $database, $options);
					$this->execute  = new ActiveRecord($this->driver);
				break;  
		}

		if($this->driver == NULL) {
			die('No Driver Selected');
		}		

	}

	function connect() {
		return $this->driver->connect();
	}

	function close() {
		$this->driver->close();
	}

	function error() {
		return $this->driver->error();
	}

	function error_transaction() {
		return $this->driver->error_transaction();
	}

	function transaction() {
		$this->driver->mode = 'transaction';
		$this->driver->transaction();
	}

	function transaction_error($function) {
		if(!empty($this->driver->error_transaction()) ) {
			$function($this);
		}
	}

	function transaction_success($function) {
		if(empty($this->driver->error_transaction()) ) {
			$function($this);
		}
	}

	function commit() {
		$this->driver->commit();
		$this->driver->mode = 'normal';
	}

	function rollback() {
		$this->driver->rollback();
		$this->driver->mode = 'normal';
	}

	function query($query, $params = []) {
		if($this->driver->mode == 'transaction') {
			return $this->driver->query($query);
		}else {
			if(!$this->driver->isconnect()) {
				$this->connect();
			}
			return $this->driver->query($query);
		}
	}

	function affected_rows() {
		return $this->driver->affected_rows();
	}



}