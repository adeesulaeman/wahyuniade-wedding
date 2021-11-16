<?php 
/*
Define ROOTDIR 
**/
define('BASEPATH', 		'');
define('ROOTDIR', 		str_replace('\\', '/', __DIR__.'/../'));
define('MODREWRITE', 	True);
define('SYSTEMDIR', 	ROOTDIR . 'system/');

include(ROOTDIR."middleware/composer/vendor/autoload.php");
include(ROOTDIR."system/RestServer/RestSystem.php");
include(ROOTDIR."middleware/middleware.php");
include(ROOTDIR."config/config.php");
include(ROOTDIR."config/database.php");
include(ROOTDIR."config/autoload.php");

\session_start();

$MIDDLEWARE = new Middleware();
new Pusaka\RestServer\RestSystem(ROOTDIR);