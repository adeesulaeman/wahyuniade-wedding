<?php 
namespace Pusaka\RestServer;

require_once(ROOTDIR.'config/database.php');
require_once(ROOTDIR.'system/Database/Db.php');

use Pusaka\Config as Config;
use Pusaka\Database\Db;

class RestInstance {

	static function db($selected_db = 'default') {

		$db = Config\Database::db();

		if(!isset($db[$selected_db])) {
			RestError::create_log_file('Database Config Failed !');
			http_response_code(500);
			die('Internal Server Error - 500');
		}

		$dbconfig = $db[$selected_db];

		//echo var_dump($dbconfig);

		return (new Db($dbconfig));

	}

	public static function library($lib = '') {

		$path 	= ROOTDIR.'library/'.$lib.'/'.basename($lib).'.php';
		if(!file_exists($path)) {
			RestError::create_log_file('Library $path not found !');
			http_response_code(500);
			die('Internal Server Error - 500');
		}else {
			require_once($path);
		}

	}

}