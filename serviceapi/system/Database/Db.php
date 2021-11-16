<?php 
namespace Pusaka\Database;

class Db {

	private $driver;
	private $mode;

	public $execute;
	public $build;
	public $parent;

	public $lastquery;

	function __construct($dbconfig) {

		$this->driver = NULL;

		$dbdriver 	= (isset($dbconfig['dbdriver'])?$dbconfig['dbdriver']:'');
		$hostname   = (isset($dbconfig['hostname'])?$dbconfig['hostname']:'');
		$username	= (isset($dbconfig['username'])?$dbconfig['username']:'');
		$password 	= (isset($dbconfig['password'])?$dbconfig['password']:'');
		$database 	= (isset($dbconfig['database'])?$dbconfig['database']:'');
		$options 	= array();
		$mode 		= 'normal';
		
		$driverpath = ROOTDIR . 'system/Database/drivers/';

		switch($dbdriver) {
			case 'mysqli' : 
					require_once($driverpath . 'mysqli/driver.php');
					require_once($driverpath . 'mysqli/result.php');
					require_once($driverpath . 'mysqli/activerecord.php');
					require_once($driverpath . 'mysqli/querybuilder.php');
					$this->driver 	= new Driver($hostname, $username, $password, $database, $options);
					$this->execute  = new ActiveRecord($this->driver);
				break; 
			case 'sqlsrv' : 
					require_once($driverpath . 'sqlsrv/driver.php');
					require_once($driverpath . 'sqlsrv/result.php');
					require_once($driverpath . 'mysqli/activerecord.php');
					require_once($driverpath . 'mysqli/querybuilder.php');
					$this->driver 	= new Driver($hostname, $username, $password, $database, $options);
					$this->execute  = new ActiveRecord($this->driver);
				break;  
		}

		if($this->driver == NULL) {
			die('No Driver Selected');
		}		

	}

	function build() {
		return new QueryBuilder($this->driver);
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

	function transaction($parent) {
		$this->connect();
		$this->driver->mode = 'transaction';
		$this->driver->transaction();
		$this->parent 		= $parent;
	}

	function transaction_error($function) {
		if(!empty($this->driver->error_transaction()) ) {
			$function($this, $this->parent);
		}
	}

	function transaction_success($function) {
		if(empty($this->driver->error_transaction()) ) {
			$function($this, $this->parent);
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
		$this->lastquery = $query; 
		if($this->driver->mode == 'transaction') {
			return $this->driver->query($query);
		}else {
			if(!$this->driver->isconnect()) {
				$this->connect();
			}
			return $this->driver->query($query);
		}
	}

	function createlog($path = "") {

		$message  .= "===============================";
		$message  .= "\r\n";
		$message  .= "PATH : ".$path;
		$message  .= "\r\n";
		$message  .= "===============================";
		$message  .= "\r\n";
		$message  .= "===============================";
		$message  .= "\r\n";
		$message   = $this->lastquery;
		$message  .= "\r\n";
		$message  .= "===============================";
		$message  .= "\r\n";
		$message  .= json_encode($this->error());
		$message  .= "\r\n";
		$message  .= "===============================";
		$message  .= "\r\n";
		$message  .= json_encode($this->error_transaction());
		$message  .= "\r\n";

		$fop 	  = fopen(__DIR__ . "/../../storage/error_log/dberrorlog_".date("YmdHis").uniqid().".php", "wb");
		fwrite($fop, $message);
		fclose($fop);
	}

	function affected_rows() {
		return $this->driver->affected_rows();
	}


	function asBuilder($array) {
		$fields = [];
		for($i=0, $c=count($array); $i<$c; $i++) {
			$fields[] = $array[$i].' AS '.'param'.md5($array[$i]);
		}
		return implode(',', $fields);
	}


}