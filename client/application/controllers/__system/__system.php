<?php 
class __system extends Pusaka_Controller {

	function __lang(){
		return[];
	}
	function __lib(){
		return[];
	}
	function __page(){
		return '__system';
	}

	function __constuct() {
		parent::__constuct();
	}

	function index() {
	}

	function js($link) {

		$link 	= Pusaka\Encrypt::getLongUrl($link);

		if($link!=False) {
			$link 	= Pusaka\Encrypt::saveUrlDecode($link);
			$link 	= str_replace('\\', '/', APPPATH . $link);
		}

		header("Content-Type: application/javascript");

		if(!$link) {
			header("HTTP/1.0 404 Not Found");
			$error  = "File not found ! 404";
			echo $error;
			
			// Begin Error --
			$error .= 
				 "\r\n" 
				."Cause : \r\n"
				."\tIn function js. \$link is false. Decode dont get a match structure ! ";
			;
			// End Error --

			// Create Log File
			Pusaka\Log::error($error);
			return;
		}

		if(!file_exists($link)) {
			header("HTTP/1.0 404 Not Found");
			$error = "File not found ! 404";
			echo $error;
			
			// Begin Error --
			$error .= 
				 "\r\n" 
				."Cause : \r\n"
				."\tIn function js. '{$link}' not an exists file ! ";
			;
			// End Error --

			// Create Log File
			Pusaka\Log::error($error);
			return;
		}

		$js 	= file_get_contents($link);
		echo $js;

	}// end js

}