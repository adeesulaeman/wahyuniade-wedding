<?php 
include('../'.'index.php');

use Pusaka\RestServer as RestServer;

class LoginApi extends RestServer\RestController {

	function gettoken() {

		$status = 1000;// 1000 - success | 2000 - error | 3000 - warning
		$error 	= '';
		$errno 	= 0;
		$data 	= array();

		$db 	= RestServer\RestInstance::db();

		$Username = $this->request->item('Username');
		$Password = md5($this->request->item('Password'));
		// var_dump($Username);
		// var_dump($Password);

		$result   = $db->query("SELECT UserId, Username, Role, Type FROM tbl_users WHERE Username='$Username' AND Password='$Password'");

		// if sql injection detected OR not found : failed login
		if($result->count() > 1 OR $result->count() <= 0) {
			$status = 2000;
			$errno 	= '001';
			$error 	= 'Login Invalid'.json_encode($db->error());
		} // end if

		if($status==1000) {

			RestServer\RestInstance::library('Pusaka/Encrypt');
			RestServer\RestInstance::library('Pusaka/Auth');
			$row = $result->rows();
			
			$Auth 	= 	new \Pusaka\Library\Auth();

			$Token 	= 	$Auth->createToken(IPClient, ApiKey, [
							// Data saved in Token
							"UserId" 		=> $row[0]['UserId'],
							"Username" 		=> $Username,
							"Role"			=> $row[0]['Role'],
							"Type"			=> $row[0]['Type']
						]);

			$data	= 	array(
				'token' => $Token,
				'uname' => $Username,
				'role'  => md5($row[0]['Role']),
				'type'  => $row[0]['Type'],
				'IdUser'  => $row[0]['UserId']
			);
		}

		$db->close();

		$this->response->json([
			"status" => $status,
			"errno"  => $errno,
			"error"	 => $error,
			"data"	 => $data
		]);

	}

	function checktoken() {

		$this->middleware->CheckToken();

		$this->response->json([
		 	"status" => 1000,
		 	"errno"  => 0,
		 	"error"	 => "",
		 	"data"	 => array()
		]);

	}

	function getuserdata() {

		$this->middleware->CheckToken();		
		$userdata = $this->middleware->GetUserData();
			
		$this->response->json([
		 	"status" => 1000,
		 	"errno"  => 0,
		 	"error"	 => "",
		 	"data"	 => $userdata
		]);

	}

}

RestServer\RunServer();