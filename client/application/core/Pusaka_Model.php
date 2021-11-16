<?php
abstract class Pusaka_Model extends CI_Model {

	const SUCCESS = 100;

	private $error_no;
	private $error_msg;
	private $statement;
	private $data;
	private $response;
	private $printresponse;

	abstract public function __SCHEMA();

	public function __construct() {
		parent::__construct();
		$this->printresponse = FALSE;
	} // end construct

	protected function __set_post($data) {
		$schema 	= $this->__SCHEMA();
		$post 	= [];
		if(is_array($data)) {
			foreach ($data as $key => $value) {
				$key_found = array_search($key, $schema);
				if($key_found!==FALSE) {
					$post[$key] = $value;
				}
			}
		}
		$this->data 		= $post;
	}

	protected function post($key = NULL) {
		if($key === NULL) {
			return $this->postfilter();
		}
		if(isset($this->data[$key])) {
			return $this->data[$key];
		}else {
			return NULL;
		}
	}

	protected function postfilter() {
		return $this->data;
	}

	/*
	header untuk response
	data diambil dari get select
	ignore untuk membuang field yang tidak perlu di ambil
	one untuk 1 row
	jika tidak ada yang di ignore maka data akan dikembalikan secara utuh
	**/
	protected function __set_response($header=array(), $data, $ignore = array(), $first = NULL) {
		if($data!=NULL AND count($ignore) > 0) {
			for($i=0, $m=count($data); $i<$m; $i++) {
				foreach($data[$i] as $key => $val) {
					if(in_array($key, $ignore)) {
						$data[$i][$key] = NULL;
						unset($data[$i][$key]);
					}
				}
				if($first==TRUE) {
					$data = $data[$i];
					break;
				}
			}
		}
		$this->response = array(
			"STATUS"	=> (isset($header['STATUS'])?$header['STATUS']:''),
			"MESSAGE" 	=> (isset($header['MESSAGE'])?$header['MESSAGE']:''),
			"E_NO" 		=> (isset($header['E_NO'])?$header['E_NO']:''),
			"E_MSG"		=> (isset($header['E_MSG'])?$header['E_MSG']:''),
			"DATA"		=> $data
		);
	}

	public function error() {
		return $this->db->error();
	}

	public function printresponse($printout = FALSE) {
		if($printout==FALSE) {
			$this->printresponse = TRUE;
		}else {
			echo json_encode($this->response);
		}
	}

	public function updateresponse($key, $value) {
		
		if(isset($this->response[$key])) {
			$this->response[$key] = $value;
		}// end if
		
	}

	public function setresponse($data = array()) {
		$this->response["DATA"] = $data;
	}

	public function getresponse() {
		return $this->response;	
	}

	public function response() {
		if($this->printresponse) {
			echo json_encode($this->response);
		}else {
			return $this->response['DATA'];
		}
	}

}
