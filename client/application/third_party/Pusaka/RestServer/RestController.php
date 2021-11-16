<?php 
namespace Pusaka\RestServer;

class RestController {
	
	protected $request;
	protected $response;
	protected $middleware;
	
	function __construct() {
		/* SYSTEM CODE */
		$this->response 	= new RestResponse();
		$this->request 		= new RestRequest();
		$this->middleware 	= $GLOBALS["MIDDLEWARE"];
	}


}