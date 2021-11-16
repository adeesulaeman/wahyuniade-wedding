<?php
namespace Pusaka;

class Hash {

	public static function dohash($str) {
		return crypt( $str , Config::app()['encrypt_key']);
	}

}