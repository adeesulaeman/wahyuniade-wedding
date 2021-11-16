<?php
namespace Pusaka;

class Session { 

	public static function start() {
		$config['session'] 	  	= Config::session();
		session_save_path($config['session']['save_path']);
		session_start();
	}

	public static function destroy() {
		session_destroy();
	}

	public static function set($key, $items) {
		$Config['session'] 	 = Config::session();
		$Config['app']		 = Config::app();
		if($Config['session']['encrypt']) {
			// encrypt using key
			$key  	= Encrypt::base64_encode($key);
			// encrypt using key
			$items 	= Encrypt::base64_encode(json_encode($items)); 
		}
		$_SESSION[$key] = $items;
	}

	public static function get($key, $child = array()) {
		$Config['session'] 	 = Config::session();
		$Config['app']		 = Config::app();
		if($Config['session']['encrypt']) {
			// decrypt using key
			$key = Encrypt::base64_encode($key);
		}

		// check and load
		if(isset($_SESSION[$key])) {
			$session = $_SESSION[$key];
			// decrypt using key
			$session = Encrypt::base64_decode($session);
			// to array
			$session = json_decode($session, true);
			// process check
			for($i=0, $m=count($child); $i<$m; $i++) {
				if(!isset($session[$child[$i]])) {
					return NULL;
				}
				$session = $session[$child[$i]];
			}
			return $session;
		}else {
			return NULL;
		}
	}

	public static function clientIp() {
		
		$ip = NULL;

		if($_SERVER) {
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}else{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
		} else {
			if(getenv('HTTP_X_FORWARDED_FOR')){
				$ip = getenv('HTTP_X_FORWARDED_FOR');
			}elseif(getenv('HTTP_CLIENT_IP')){
				$ip = getenv('HTTP_CLIENT_IP');
			}else{
				$ip = getenv('REMOTE_ADDR');
			}
		}

		return $ip;

	}

}