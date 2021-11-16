<?php
namespace Pusaka\Library;

class Auth {

	function __construct() {
		if(!class_exists('Pusaka\Library\Encrypt')) {
			die('Require Library : Pusaka\\Library\\Encrypt Class! [Class Not Found]');
		}
	}

	function createToken($ClientIP, $ApiKey, $data = []) {

		$ClientIP 	= ($ClientIP=='::1'?'127.0.0.1':$ClientIP);
		$Token 		= md5($ApiKey.$ClientIP.date('Ymd'));
		$data 		= json_encode($data);
		$Token 		= $Token.'%::%'.$data;
		$Token 		= \Pusaka\Library\Encrypt::saveUrlEncode($Token);
		return $Token;
	
	}

	function checkToken($ClientIP, $ApiKey, $Token) {

		

		$Decrypt 	= \Pusaka\Library\Encrypt::saveUrlDecode($Token);
		$Segments 	= explode('%::%', $Decrypt);
		$Token 		= isset($Segments[0])?$Segments[0]:NULL;
		if($Token!==NULL) {

			if(isset($ClientIP)) {
				
				$ClientIP = ($ClientIP=='::1'?'127.0.0.1':$ClientIP);
				
				if(trim($Token) == trim(md5($ApiKey.$ClientIP.date('Ymd')))) {
					return True;
				}

				if($ClientIP == $_SERVER['REMOTE_ADDR']) {
					return True;
				}

			}

		}
		return False; 
	
	}

	function getItems($ClientIP, $ApiKey, $Token) {

		$Decrypt 	= \Pusaka\Library\Encrypt::saveUrlDecode($Token);
		$Segments 	= explode('%::%', $Decrypt);
		$Token 		= isset($Segments[0])?$Segments[0]:NULL;
		$Data 		= isset($Segments[1])?$Segments[1]:NULL;
		if($Token!==NULL) {

			if(isset($ClientIP)) {
				
				$ClientIP = ($ClientIP=='::1'?'127.0.0.1':$ClientIP);
				
				if(trim($Token) == trim(md5($ApiKey.$ClientIP.date('Ymd')))) {
					return json_decode($Data, true);
				}

			}

		}
		return NULL;

	}

} 