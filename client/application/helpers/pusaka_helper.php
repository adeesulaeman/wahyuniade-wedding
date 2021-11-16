<?php 
if(!function_exists('newDate')) {
	function newDate($format = 'Y-m-d H:i:s') {

		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Jakarta'));

		return $date->format($format);
		
	}
}
if(!function_exists('debug')) {
	function debug($var) {
		echo "<pre>";
		echo var_dump($var);
		echo "</pre>";
	}
}

if(!function_exists('enField')) {
	function hashfield($var) {
		return 'param'.md5($var);		
	}
}

if(!function_exists('ucfirstpath')) {
	function ucfirstpath($cwdir) {
		$cwdirn = explode("/", $cwdir);
		$a      = [];
		for ($i=0, $c=count($cwdirn); $i<$c-1; $i++) { 
		    $a[] = $cwdirn[$i];
		}
		$a[]     = ucfirst($cwdirn[$i]);
		$cwdirn  = implode("/", $a);
		return $cwdirn;
	}
}

if ( ! function_exists('check_login'))
{
    function check_login()
    {
    	$uname = Pusaka\Auth::getUser();
        return $uname['Uname'];
    }
}

if ( ! function_exists('check_role_login'))
{
    function check_role_login()
    {
    	$uname = Pusaka\Auth::getUser();
        return $uname['Role'];
    }
}

if ( !function_exists('check_type_login'))
{
    function check_type_login()
    {
    	$type = Pusaka\Auth::getUser();
        return $type['Type'];
    }
}

if ( !function_exists('check_IdUser_login'))
{
    function check_IdUser_login()
    {
    	$type = Pusaka\Auth::getUser();
        return $type['IdUser'];
    }
}