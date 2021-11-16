<?php
namespace Pusaka;

class Encrypt {

	public static function iv() {
		$config['app'] 	= Config::app();
		$file		 	= $config['app']['path'].'Storage/6a1c13ec0bb58dd4f407e38b9d400a5a';
		if(!file_exists($file)) {
			$iv 		= openssl_random_pseudo_bytes(16);

			$fhandle 	= fopen($file, 'w');
			fwrite($fhandle, $iv);
			fclose($fhandle);
		}
		$fhandle = fopen($file, 'rb');
		$iv 	 = fread($fhandle, 16);
		return $iv;
	}

	public static function encode($plaintext) {
		$config['app'] 	= Config::app();
		$key 			= substr(sha1($config['app']['encrypt_key'], true), 0, 16);
		$ciphertext 	= openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, Encrypt::iv());
		return $ciphertext;
	}

	public static function decode($encoded) {
		$config['app'] 	= Config::app();
		$key 			= substr(sha1($config['app']['encrypt_key'], true), 0, 16);
		$original 		= openssl_decrypt($encoded, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, Encrypt::iv());
		return $original;
	}

	public static function base64_encode($plaintext) {
		return base64_encode(Encrypt::encode($plaintext));
	}

	public static function base64_decode($base64_text) {
		return Encrypt::decode(base64_decode($base64_text));
	}

	public static function saveUrlEncode($url) {
		$url = base64_encode(base64_encode(Encrypt::encode($url)));
		$rev = strrev($url);
		$i   = 0;
		$c   = 0;
		$rep = '';
		while(isset($rev[$i])) {
			if($rev[$i]!=='=') {
				break;
			}
			$rep .= '=';
			$c++;
			$i++;
		}
		if($rep=='') {
			$rev = '0_'.$rev;
		}else {
			$i   = 1;
			$rev = str_replace($rep, ($c.'_'), $rev, $i);
		}
		return $rev;
	}

	public static function saveUrlDecode($url_encoded) {
		$piece 		= explode('_', $url_encoded);
		$ori 	 	= '';
		if(is_numeric($piece[0])) {
			$with = '';
			for($i=$piece[0]; $i>0; $i--) {
				$with .= '=';
			}
			$m 	= 1;
			$ori  = str_replace($piece[0].'_', $with, $url_encoded, $m);
			$ori  = strrev($ori);
			$ori  = Encrypt::base64_decode(base64_decode($ori));
			return $ori;
		}
	}

	public static function randString($len) {

		$pool 	= "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$max 	= strlen($pool)-1;

		$str 	= "";

		for($i=0; $i<$len; $i++) {
			$c 		= rand( 0 , $max );
			$str   .= substr($pool, $c, 1);
		}

		return $str;

	}

	public static function loadShortUrlDb() {

		$db 	= str_replace('\\', '/', __DIR__ . '/Storage/shorturl');

		if(!file_exists($db)) {
			return [];
		}

		$shorturl = file_get_contents($db);

		// Load
		$shorturl = explode("\n", $shorturl);

		$list 	  = [];
				
		for($i=0, $c=count($shorturl); $i<$c; $i++) {
			$temp = str_replace( ['[',']'] , ['',''], $shorturl[$i]);
			$temp = explode('=', $temp);
			if(isset($temp[1])) {
				$list[$temp[0]] = $temp[1];
			} 
		}

		return $list;

	}

	public static function saveShortUrlDb($key, $shorturl) {

		$db 	= str_replace('\\', '/', __DIR__ . '/Storage/shorturl');

		if(!file_exists($db)) {
			return False;
		}

		$last 		= file_get_contents($db);

		$fh 	 	= fopen($db, 'w');

		fwrite($fh, $last."[$key=$shorturl]\n");

		fclose($fh);

		return True;

	}

	public static function shortUrl($key) {

		$db 	= Encrypt::loadShortUrlDb();

		// Check Url Registered
		if(isset($db[$key])) {
			return $db[$key];
		}

		// save to db
		$shortUrl = "";
		
		do {
			$shortUrl = Encrypt::randString(10);
		}while(array_search($shortUrl, $db)!==False);

		Encrypt::saveShortUrlDb($key, $shortUrl);

		return $shortUrl;
	
	}

	public static function getLongUrl($shortUrl) {

		$db 	= Encrypt::loadShortUrlDb();

		return array_search($shortUrl, $db);

	}	

}
