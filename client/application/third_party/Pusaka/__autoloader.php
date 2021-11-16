<?php

$PusakaAutoloader = [
	'Config.php',
	'Response.php',
	'Log.php',
	'Loader.php',
	'Encrypt.php',
	'Session.php',
	'Auth.php',
	'AuthResponse.php',
	'Components.php'
];

for($i=0, $m=count($PusakaAutoloader); $i<$m; $i++) {
	require_once(APPPATH.'third_party/'.'Pusaka/'.$PusakaAutoloader[$i]);
} // end for
