<?php
namespace Pusaka\Library;

class Encrypt {

	public static function iv() {
		$config['app'] 	= \Pusaka\Config\Config::app();
		$file		 	= $config['app']['path'].'storage/'.md5($config['app']['encrypt_key']);
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
		$config['app'] 	= \Pusaka\Config\Config::app();
		$key 			= substr(sha1($config['app']['encrypt_key'], true), 0, 16);
		$ciphertext 	= openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, Encrypt::iv());
		return $ciphertext;
	}

	public static function decode($encoded) {
		$config['app'] 	= \Pusaka\Config\Config::app();
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
		$piece = explode('_', $url_encoded);
		$ori 	 = '';
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

}
