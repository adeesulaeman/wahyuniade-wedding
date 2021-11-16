<?php 
include('../'.'index.php');
include(SYSTEMDIR . 'RestServer/RestRequestFilter.php');

use Pusaka\RestServer as RestServer;
use Pusaka\Library\DateTime as DateTime;
use Pusaka\RestServer\RestRequestFilter as RequestFilter;

class UcapandandoaApi extends RestServer\RestController {

	private function __useSecurity() {

		// Check Valid Token : Recomend
		// ------------------------------------------------------------
		$this->middleware->CheckToken(
			$this->request->clientIP(), 
			$this->request->item('p94a08da1fecbb6e8b46990538c7b50b2'),
			function($response) {
				$this->response->json($response);
			}
		);
		// ------------------------------------------------------------
	
	}

	private function __userData() {

		// [UserId, Role]
		
		// Get User Data
		// ------------------------------------------------------------
		return $this->middleware->GetUserData(
			$this->request->clientIP(), 
			$this->request->item('p94a08da1fecbb6e8b46990538c7b50b2')
		);
		//-------------------------------------------------------------

	}

	function add() {

		$status = 1000;// 1000 - success | 2000 - error | 3000 - warning
		$error 	= '';
		$errno 	= 0;
		$errmsg = '';
		$data 	= array();

		$db 		= RestServer\RestInstance::db();

		$allowed 	= $this->request->required([], "POST");

		$allowed = true;
		if(!$allowed) {
			errcode(404);
		}

		// var_dump($duplikatuname);

			RestServer\RestInstance::library('Pusaka/PrimaryKey');

			$RequestFilter = new RequestFilter();
			$RequestFilter->setFilter([
				'' => NULL
			]);
            
			$db->execute->insert('tbl_ucapan', [
				"nama"			    => 	$this->request->item('name'),
				"circle"			=> 	$this->request->item('circle'),
                "ucapan"			=> 	$this->request->item('notes'),
                "add_date"			=> 	DateTime::now(),
				"status"			=> 	"Show"
			]);

			// if sql injection detected OR not found : failed login
			if($db->affected_rows() <= 0) {
				$status = 2000;
				$errmsg = '';
				$errno 	= '001';
				$error 	= $db->error();
			} // end if

		$db->close();

		$this->response->json([
			"status" => $status,
			"errno"  => $errno,
			"errmsg" => $errmsg,
			"error"	 => $error,
			"data"	 => $data
		]);

	}// end : method

	function datatable() {

		//$this->__useSecurity();

		RestServer\RestInstance::library('Pusaka/DataTable');

		$DataTable 	= new Pusaka\Library\DataTable();

		$DataTable->attributes([
			'id'			=> 	'id',
			'nama'		=> 	'nama',
			'circle'	=> 	'circle',
			'ucapan'				=> 	'ucapan',
			'DATE(add_date)'				=> 	'add_date'
		]);
		$DataTable->from('tbl_ucapan');
		$DataTable->where("status='Show'");
		$DataTable->orders(['add_date'=>'DESC'], 'orders');
		$DataTable->limit(6, 'limit');
		$DataTable->response();
		
	}// end : method


}

RestServer\RunServer();