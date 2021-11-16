<?php 
class Middleware {
	
	function __construct() {

		define('IPClient', 	($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR']) );
		define('ApiKey', 	Pusaka\Config\Config::apiKey());

	}

	function CheckToken($ClientIP = NULL, $Token = NULL, $func = NULL) {

		\Pusaka\RestServer\RestInstance::library('Pusaka/Encrypt');
		\Pusaka\RestServer\RestInstance::library('Pusaka/Auth');

		$Auth 		= new \Pusaka\Library\Auth();

		if($ClientIP === NULL AND $Token === NULL) {
			$ClientIP 	= (isset($_POST['IP'])?$_POST['IP']:NULL);
			$Token 		= (isset($_POST['TOKEN'])?$_POST['TOKEN']:NULL);
		}

		$Allowed 	= $Auth->checkToken($ClientIP, ApiKey, $Token);

		if(!$Allowed) {

			if($func!==NULL) {
				$func([
					"status" => 2000,
					"errno"	 => 200,
					"error"	 => "Invalid Token ! ",
					"data" 	 => array()
				]);
				die();
			}

			die(
				json_encode([
					"status" => 2000,
					"errno"	 => 200,
					"error"	 => "Invalid Token ! ",
					"data" 	 => array()
				])
			);
		}

		return True;

	}

	function GetUserData($ClientIP = NULL, $Token = NULL) {

		\Pusaka\RestServer\RestInstance::library('Pusaka/Encrypt');
		\Pusaka\RestServer\RestInstance::library('Pusaka/Auth');

		$Auth 		= new \Pusaka\Library\Auth();

		if($ClientIP === NULL AND $Token === NULL) {
			$ClientIP 	= (isset($_POST['IP'])?$_POST['IP']:NULL);
			$Token 		= (isset($_POST['TOKEN'])?$_POST['TOKEN']:NULL);
		}

		return $Auth->getItems($ClientIP, ApiKey, $Token);

	}

}