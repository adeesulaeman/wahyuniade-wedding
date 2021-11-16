<?php 
namespace Pusaka\RestServer;

class RestDebug {

	public static function debug($vars) {
		echo '<pre>';
		echo var_dump($vars);
		echo '</pre>';
	}

	public static function etime($s, $e) {
		echo '<pre>';
		echo $e-$s;
		echo '</pre>';
	}

	public static function mtime() {
		return microtime(true);
	}

}