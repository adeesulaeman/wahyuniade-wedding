<?php 
namespace Pusaka\RestServer;

class RestRequest {

	function item($key, \Pusaka\RestServer\RestRequestFilter $filter = NULL, $encodetype = NULL) {

		$post 		= $this->post();

		$encrypt 	= \Pusaka\Config\Config::useEncryptPostKey();

		if($encrypt) {
			$key 	= 'param'.md5($key);
		}

		$val 	= (isset($post[$key])?$post[$key]:NULL);
		if($val!=NULL AND $encodetype!=NULL){
			switch($encodetype) {
				case 'md5'	: $val = md5($val); break;
				default 	: break;
			}
		}

		if($filter !== NULL) {
			if($filter->match($val)) {
				$val = $filter->getFilter($val);
			}
		}
		
		return $val; 

	}// :end-method

	function post() {
		
		if(!empty($_POST)) {
			return $_POST;
		}else {
			return json_decode(file_get_contents('php://input'), True);
		}

	}// :end-method

	function file() {
		
		return $_FILES;

	}// :end-method

	function required($keys = [], $type = "POST") {

		if($type=="GET") {

			for($i=0, $c=count($keys); $i<$c; $i++) {
				if($keys[$i]===NULL OR $keys[$i]=="") {
					return False;
				}				
			}

			return True;

		}

		if($type=="POST") {
			
			$encrypt 	= \Pusaka\Config\Config::useEncryptPostKey();

			$post 		= $this->post();
			
			for($i=0, $c=count($keys); $i<$c; $i++) {

				if($encrypt) {
					$key 	= 'param'.md5($keys[$i]);
				}else {
					$key 	= $keys[$i];
				}

				if(!isset($post[$key])) {
					return False;
				}
			}

			return True;
			
		}

		else {
			return False;			
		}
		

	}// :end-method

	function clientIP() {
		return ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR']);
	}// : end-method

}