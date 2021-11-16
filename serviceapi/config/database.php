<?php
namespace Pusaka\Config;

class Database {

	public static function active_group() {
		return 'default';
	}

	public static function query_builder() {
		return TRUE;
	}

	public static function db() {

		$db['default'] 	= array(
			'dsn'	   => '',

			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'wedding_db',
			'dbdriver' => 'mysqli',

			// 'hostname' => 'SERVER2',
			// 'username' => 'remoteuser',
			// 'password' => '1234',
			// 'database' => 'app_pos',
			// 'dbdriver' => 'mysqli',

			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => FALSE,//(ENVIRONMENT !== 'production'),
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt'  => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);

		return $db;
	}
	
}
