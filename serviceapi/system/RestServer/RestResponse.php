<?php 
namespace Pusaka\RestServer;

class RestResponse {

	function json($array) {
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($array);
	}

	function xml($array) {
	}

}