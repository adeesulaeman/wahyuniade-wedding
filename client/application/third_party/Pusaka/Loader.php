<?php
namespace Pusaka;

class Loader {
	
	public static function library($lib = '') {
		$config['app']	= Config::app();
		$lib 			= $config['app']['path'].'Library/'.$lib.'/'.$lib.'.php';
		if(!file_exists($lib)) {
			die('Library Not Found !');
		}else {
			require_once($lib);
		}
	}

}