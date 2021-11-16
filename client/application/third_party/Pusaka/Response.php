<?php 
namespace Pusaka;

class Response {

	public function printout(array $status, array $error, $data) {

		$response = array(
			 "STAT" 	=> isset($status['code'])?		$status['code'] 	:''
			,"MESSAGE"	=> isset($status['message'])?	$status['message'] 	:''
			,"E_CODE" 	=> isset($error['code'])? 		$error['code'] 		:''
			,"E_MSG"	=> isset($error['message'])? 	$error['message'] 	:''
			,"DATA"		=> $data
		);

		echo json_encode($response);
		
		return False;

	}// end method

}