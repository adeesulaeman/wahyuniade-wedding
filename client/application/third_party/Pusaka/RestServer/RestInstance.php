<?php 
namespace Pusaka\RestServer;

use Pusaka\Database\Db;

class RestInstance {

	static function db($selected_db = 'default') {

		require_once(ROOTDIR.'application/config/database.php');
		require_once(ROOTDIR.'application/third_party/Pusaka/Database/Db.php');

		if(!isset($db[$selected_db])) {
			http_response_code(500);
			die('Internal Server Error - 500');
		}

		$dbconfig = $db[$selected_db];

		//echo var_dump($dbconfig);

		return (new Db($dbconfig));

	}

	public static function library($lib = '') {
		$path	= ROOTDIR.'application/third_party/Pusaka/RestServer/';
		$lib 	= $config['app']['path'].'RestLibrary/'.$lib.'/'.$lib.'.php';
		if(!file_exists($lib)) {
			http_response_code(500);
			die('Internal Server Error - 500');
		}else {
			require_once($lib);
		}
	}

}