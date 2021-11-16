<?php 
namespace Pusaka\Config;

class Config {

	public static function app() {
		return [
			"path"			=> ROOTDIR,
			"encrypt_key"	=> Config::securityKey()
		];
	}

/*
|------------------------------------------------------------
| apiKey
|------------------------------------------------------------
|
| Digunakan untuk generate token login, match client key
|
**/
	public static function apiKey() {
		return "2ce15977197355e2a2b45d801d17ba05";
	}

/*
|------------------------------------------------------------
| securityKey
|------------------------------------------------------------
|
| Digunakan untuk keamanan, encrypt post, url, data
|
**/
	public static function securityKey() {
		return "2ce15977197355e2a2b45d801d17ba05";
	}

/*
|------------------------------------------------------------
| useEncryptPostKey
|------------------------------------------------------------
|
| Digunakan untuk mengaktifkan fitur encrypt post key
| ex: Id => paramXys456ajklq
|
**/
	public static function useEncryptPostKey() {
		return False;
	}


	public static function DateTime() {
		
		// list timezone : http://php.net/manual/en/timezones.php
		date_default_timezone_set("Asia/Jakarta");
		
		return [
			'default_format' => 'Y-m-d H:i:s'
		];

	}

}