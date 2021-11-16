<?php
namespace Pusaka\Library;

class DataTable {

	private $attributes;
	private $limit;
	private $order;
	private $mode;
	private $table;
	private $driver;

	private $queryData;
	private $queryCount;

	function __construct() {

		// Loaders
		if(!file_exists(__DIR__.'/config.php')){
			die('config.php not found !');
		}

		require_once(__DIR__.'/config.php');

		$driver = $database['driver'];

		if(!file_exists(__DIR__.'/drivers/'.$driver.'/driver.php')){
			die('driver not found !');
		};

		require_once(__DIR__.'/drivers/'.$driver.'/driver.php');
		require_once(__DIR__.'/drivers/'.$driver.'/func.php');
		require_once(__DIR__.'/drivers/'.$driver.'/result.php');
		require_once(__DIR__.'/drivers/'.$driver.'/activerecord.php');

		$this->driver 		= new DataTable\Database\Driver($database);

		$this->attributes 	= array();
		$this->mode 		= 'auto';
		
		$this->order 		= array();
		$this->limit 		= 20;
 		$this->where 		= '';

	}

	// Use : 1
	function attributes(array $attr = array()) {
		if(!$this->isAssoc($attr)) {
			echo ('Attributes Not Match Assoc Array ! ');
			return;
		}
		$this->attributes = $attr;
	}

	// Use : 2
	function from(string $table = '') {
		$mode 			= 'auto';
		$this->table 	= $table;
	}

	function where($where) {
		$this->where 	= $where; 
	}

	function search() {

		$keysearch 		= isset($_POST['keysearch'])?$_POST['keysearch']:'';

		$fieldsearch    = isset($_POST['search'])?$_POST['search']:'';
		
		if(($keysearch=='' OR $keysearch==NULL) AND empty($fieldsearch)) { 
			return '';
		}


		$search = [];
		foreach ($this->attributes as $key => $value) {
			$search[] = $this->driver->func->upper($key)." LIKE ".$this->driver->func->upper("'%".$keysearch."%'");
		}

		$search 		= implode(' OR ', $search);

		if($search=='' AND empty($fieldsearch)) {
			return '';
		}

		$search 		= 'AND ( '.$search.' ) ';

		$advsearch 		= [];

		if(empty($fieldsearch)) {
			return $search;
		}

		foreach ($fieldsearch as $key => $value) {
			$key 		= array_search($key, $this->attributes);
			if(!$key) {
				return $search;
			}
			$advsearch[]= $this->driver->func->upper($key)." LIKE ".$this->driver->func->upper("'%".$value."%'");		
		}
		
		if(empty($advsearch)) {
			return $search;
		}

		$advsearch 		= implode(' AND ', $advsearch);

		$advsearch 		= 'AND ( '.$advsearch.' ) ';

		return $search.$advsearch;

	}

	function limit($limit = '*', $post = NULL) {
		if(is_integer($limit)) {
			$this->limit = $limit;
		}
		if($post!=NULL) {
			$this->limit = intval((!isset($_POST[$post]))?$this->limit:($_POST[$post]!=''?$_POST[$post]:$this->limit));
		}
	}

	function orders(array $orders = array(), $post = NULL) {
		if($post!=NULL) {
			$torders = (!isset($_POST[$post])?array():$_POST[$post]);		
			if(!empty($torders)) {
				$orders = $torders;
			}
		}
		if(!$this->isAssoc($orders)) {
			die('Orders not match assosiative array!');
		}
		$this->order = $orders;
	}

	function queryData($query) {
		$mode = 'manual';
		$this->queryData = $query;
	}

	function queryCount($query) {
		$mode = 'manual';
		$this->queryCount = $query;
	}

	function response() {

		$status 	= 0;
		$errno 		= 0;
		$error 		= '';
		$rows 		= [];
		$current 	= 0;
		$count 		= 0;
		$total 		= 0;


		$query = array();
		
		if($this->mode=='manual') {
			$sql = $this->getResponseManual();
		}else {
			$sql = $this->getResponseAuto();
		}

		// Pagination
		$current 	= intval((isset($_POST['current']))? $_POST['current'] : 1);

		$limit 		= $this->limit;

		$start 	 	= ($current - 1) * $limit;
		
		if($this->limit!='*') {
			$sqllimit = $this->driver->limit($start, $limit);
		}else {
			$sqllimit = '';
		}

		$tsql 		= $sql['data'] . $this->driver->order($this->order) . $sqllimit;

		$this->driver->connect();
		
		// execute query data
		$result  		= $this->driver->query($tsql);
		if($this->driver->iserror()) {
			$status 	= 1;
			$errno 		= 100;
			$error 		= $this->driver->error();

			$message 	= $tsql;

			$this->create_log_file($message);
		}else {
			$rows 	 	= $result->rows();
		}

		$tsql 		= $sql['count'];

		// execute query count
		$result  		= $this->driver->query($sql['count']);
		if($this->driver->iserror()) {
			$status 	= 1;
			$errno 		= 200;
			$error 		= $this->driver->error();

			$message 	= $tsql;

			$this->create_log_file($message);
		}else {
			$count 		= $result->rows();
		}

		if($status==0) {
			$count 		= isset($count[0]['COUNT'])?$count[0]['COUNT']:0;
		}else {
			$rows 		= 0;
			$count 		= 0;
		}
		
		$this->driver->close();

		if($this->limit!='*') {
			$total 		= floor($count/$this->limit);
			$total 		= ((($count % $this->limit)!=0)?($total+=1):$total);
		}else {
			$total 		= 1;
		}

		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');

		echo json_encode(array(
			"status" => $status,
			"errno"  => $errno,
			"error"	 => $error,
			"data" 	 => array(
				'rows' 		=> $rows,
				'count'		=> (int) $count,
				'current'	=> (int) $current,
				'total'		=> (int) $total,
				'post'		=> $_POST
			)
		));

	}

	private function getResponseAuto() {
		$sql 	= 'SELECT %fields% FROM %table% WHERE 1=1 %where% %search% ';
		$count 	= 'SELECT COUNT(*) AS COUNT FROM %table% WHERE 1=1 %where% %search% ';
		$fields = array();
		$where 	= $this->where;
		$search = $this->search();
		
		// where
		if($where!='') {
			$where = ' AND ('.$where.') ';
		}

		foreach ($this->attributes as $key => $value) {
			$fields[] = $key . ' AS ' . $value;
		}

		$sql 	= 	str_replace([
						'%fields%',
						'%table%',
						'%where%',
						'%search%'
					], [
						implode(',', $fields),
						$this->table,
						$where,
						$search
					], $sql);

		$count 	= 	str_replace([
						'%fields%',
						'%table%',
						'%where%',
						'%search%'
					], [
						implode(',', $fields),
						$this->table,
						$where,
						$search
					], $count);

		return array(
			'data' 	=> $sql,
			'count' => $count
		);
	}

	private function getResponseManual() {
		$sql 	= $this->queryData;
		$count 	= $this->queryCount;

		$sql 	= str_replace('{{search}}', $where, $sql);
		$count 	= str_replace('{{search}}', $where, $count);

		return array(
			'data' 	=> $sql,
			'count' => $count
		);
	}


	// private tools
	private function isAssoc(array $arr) {
		if (array() === $arr) return false;
		return array_keys($arr) !== range(0, count($arr) - 1);
	}

	private function create_log_file($message) {

		$fop 	  = fopen(__DIR__ . "/error_log/errorlog_".date("YmdHis").uniqid().".php", "wb");
		fwrite($fop, $message);
		fclose($fop);

	}


}
