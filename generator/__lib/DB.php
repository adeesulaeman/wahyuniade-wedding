<?php
namespace Generator;

// class DB {

// 	private $conn;
// 	private $result;

// 	function open() {
// 		$serverName 	= "SERVER2";
// 		$connectionInfo = array( "Database"=>"PeterPiano", "UID"=>"sa", "PWD"=>"1qaz_2wsx");
// 		$conn 			= sqlsrv_connect( $serverName, $connectionInfo);
// 		if( $conn ) {
// 			$this->conn = $conn;
// 			//dump("Connection established.");
// 		}else{
// 			dump("Connection could not be established.");
// 			die( print_r( sqlsrv_errors(), true));
// 		}
// 	}

// 	function query($query, $param=[]) {
// 		$this->result = sqlsrv_query($this->conn, $query, $param);
// 		return $this->result;
// 	}

// 	function rows() {
// 		$rows 	= [];
// 		while($row 	= sqlsrv_fetch_array($this->result, SQLSRV_FETCH_ASSOC)) {
// 			$rows[] = $row;
// 		}
// 		return $rows;
// 	}

// 	function close() {
// 		sqlsrv_close($this->conn);
// 	}

// 	static function execute_query($query, $param=[]) {
// 		$serv 	= new DB();
// 		$serv->open();
// 		$serv->query($query, $param);
// 		$rows 	= $serv->rows();
// 		$serv->close();
// 		return $rows;
// 	}

// }

class DB {

	private $conn;
	private $result;

	function open() {
		$serverName 	= "localhost";
		$connectionInfo = array( "Database"=>"beasiswa_db", "UID"=>"root", "PWD"=>"");
		$conn 			= mysqli_connect($serverName, $connectionInfo["UID"], $connectionInfo["PWD"], $connectionInfo["Database"], 3306);
		if( $conn ) {
			$this->conn = $conn;
			//dump("Connection established.");
		}else{
			dump("Connection could not be established.");
			die( print_r( mysqli_error(), true) );
		}
	}

	function query($query, $param=[]) {

		$execute = '';
		$queries = explode('?', $query);

		for($i=0, $c=count($queries); $i<$c; $i++) {
			if(isset($param[$i])) {
				$value 	  = $param[$i];
				$value 	  = (is_string($value)?"'$value'":(is_numeric($value)?$value:'[error - undefined - type]'));
				$execute .= $queries[$i].$value;
			}else {
				$execute .= $queries[$i].'';
			}
		}

		$this->result = mysqli_query($this->conn, $execute);
		
		return $this->result;
	}

	function rows() {
		$rows 	= [];
		while($row 	= mysqli_fetch_assoc($this->result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function close() {
		mysqli_close($this->conn);
	}

	static function execute_query($query, $param=[]) {
		$serv 	= new DB();
		$serv->open();
		$serv->query($query, $param);
		$rows 	= $serv->rows();
		$serv->close();
		return $rows;
	}

}
