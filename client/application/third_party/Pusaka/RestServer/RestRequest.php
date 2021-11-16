<?php 
namespace Pusaka\RestServer;

class RestRequest {

	function item($key) {
		$key = md5($key);
		return (isset($_POST[$key])?$_POST[$key]:NULL);
	}

	function post() {
		return $_POST;
	}

	function file() {
		return $_FILES;
	}

	function required($keys = []) {
		$post = $this->post();
		for($i=0, $c=count($keys); $i<$c; $i++) {
			if(!isset($post[md5($keys[$i])])) {
				echo $keys[$i];
				return False;
			}
		}
		return True;
	}

}