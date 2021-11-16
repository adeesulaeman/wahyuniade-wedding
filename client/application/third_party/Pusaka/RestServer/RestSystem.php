<?php 
namespace Pusaka\RestServer;

class RestSystem {

	private $root;
	private $config;

	function __construct($root) {
		$this->root 	= $root;
		$this->config 	= $this->__config();
		$this->__autoloader();
	}

	public function __config() {
		return [
			'SYSPATH' 		=> $this->root.'application/third_party/Pusaka/RestServer/'
		];
	}

	private function __autoloader() {

		$files = [
			'RestMiddleware.php',
			'RestController.php',
			'RestRequest.php',
			'RestResponse.php',
			'RestInstance.php',
			'RestDebug.php'
		];

		for($i=0, $c=count($files); $i<$c; $i++) {
			include($this->config['SYSPATH'].$files[$i]);
		}

	}

}

function RunServer() {

	if(MODREWRITE) {
		$script 	= basename($_SERVER['SCRIPT_FILENAME'], '.php');
	}else {
		$script 	= basename($_SERVER['SCRIPT_FILENAME']);
	}

	$controller = basename($_SERVER['SCRIPT_FILENAME'], '.api.php');
	$controller = ucfirst($controller).'Api';

	if(!class_exists($controller)) {
		http_response_code(404);
		die('ERROR 404 - PAGE NOT FOUND');
	}

	$run = new $controller;

	// call method
	$segments 	= explode($script, $_SERVER['REQUEST_URI']);
	$segments 	= (isset($segments[1])?$segments[1]:'');
	$segments 	= preg_replace('/\//', '', $segments, 1);
	$segments 	= explode('/', $segments);

	if(!$segments[0]!='') {
		http_response_code(404);
		die('ERROR 404 - PAGE NOT FOUND');
	}

	$method 	= preg_replace("/([\?][\w|\W]*)/", "", $segments[0]);

	array_shift($segments);

	/* Invoke Method */
	$refmethod 	= new \ReflectionMethod(get_class($run), $method);
	$parameters = $refmethod->getParameters();
	$args 		= array();
	foreach ($parameters as $num => $parameter) {
		$args[] = isset($segments[$num])?$segments[$num]:NULL;
	}
	$refmethod->invokeArgs($run, $args);
	/* ----------------------------- */

}