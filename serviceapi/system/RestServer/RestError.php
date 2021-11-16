<?php
namespace Pusaka\RestServer;

class RestError {
	
	public static function create_log_file($message) {

		$fop 	  = fopen(__DIR__ . "/../../storage/error_log/errorlog_".date("YmdHis").uniqid().".php", "wb");
		fwrite($fop, $message);
		fclose($fop);

	}


}