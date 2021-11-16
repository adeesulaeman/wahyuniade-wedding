<?php 
namespace Pusaka;

class Auth {

	const NORMAL 	= 0;
	const PASSWORD 	= 1;
	const MD5 		= 2;

	private $roles;
	private $config;

	public function __construct() {
		$this->roles 		 	= array();
		$this->config['app'] 	= Config::app();
	}

	public static function login($value = NULL) {
		if($value!==NULL) {
			// Set
			Session::set('login', $value);
		}else {
			// Get
			if(Session::get('login', [])==NULL) {
				return false;
			}else {
				return true;
			}
		}
	}

	public static function setUser(array $items = array()) {
		$items_ = [
			'ip' => Session::clientIp()
		];
		foreach ($items as $key => $value) {
			$items_[$key] = $value;
		}
		Session::set(md5('pauthuser'), $items_);
	}

	public static function getUser(array $items = array()) {
		return Session::get(md5('pauthuser'), $items);
	}

	public static function password($password, $hash = NULL) {
		if($hash==NULL) {
			return password_hash($password, PASSWORD_DEFAULT);
		}else {
			return password_verify($password , $hash);
		}
	}

	public static function verify($post) {
		foreach ($post as $key) {
			if(!isset($_POST[$key])) {
				return false;
			}else {
				// check injection
			}
		}
		return true;
	}

	public static function validate($table = '', $user_data = []) {
		
		$CI =& get_instance();

		// $data['compare'] 	= [];
		// $data['fetch']		= [];
		// $data['password']	= ['password'];

		// foreach ($user_data as $key => $value) {
		// 	if(isset($data[$key])) {
		// 		$data[$key] = $value;
		// 	}
		// }

		// $col = implode(',' , $data['fetch']);

		$field 	= array();
		$param  = array();
		foreach ($user_data as $key => $value) {
			$field[] = $key.'=?';
			$param[] = $value;
		}

		$where 		= implode(' AND ', $field);

		$query 		= $CI->db->query("SELECT * FROM $table WHERE $where;", $param);
		$row 		= $query->result_array();

		$status 	= 'accepted';

		// error
		if($row === NULL) {
			$status = 'rejected';
		}else 

		// sql injection detect risk
		if(count($row) > 1) {
			$status = 'rejected';
		}else 

		// data not found
		if(empty($row)) {
			$status = 'rejected';
		}

		if($status=='rejected') {
			$data = NULL;
		}else {
			$data = $row[0];
		}

		return new AuthResponse($status, $data);

	}

	public static function post($name) {
		if(isset($_POST[$name])) {
			return $_POST[$name];
		}else {
			return NULL;
		}
	}

	/*
	|---------------------------------------------------------
	| roles
	|---------------------------------------------------------
	| digunakan untuk registrasi role 
	| load role dari folder Auth/Roles/role
	|
	*/
	public function roles($role = '') {
		
		$roles  = array();
		$folder = $this->config['app']['path'].'Auth/Roles/';
		$file 	= $folder.$role.'.role.php';
		if(file_exists($file)) {	
			$roles = require_once($file);
		}
		$this->roles = $roles;
	
	} // end method

	public function check($code, array $items = array()) {
		
		if(isset($this->roles[$code])) {
			$role = $this->roles[$code];
			for($i=0, $m=count($items); $i<$m; $i++) {
				if(!isset($role[$items[$i]])) {
					return false;
				}
				$role = $role[$items[$i]];
			}
			return true;
		}

	} // end method

	public function item($code, array $items = array(), $def = NULL) {
		
		if(isset($this->roles[$code])) {
			$role = $this->roles[$code];
			for($i=0, $m=count($items); $i<$m; $i++) {
				if(!isset($role[$items[$i]])) {
					return $def;
				}
				$role = $role[$items[$i]];
			}
			return $role;
		}else {
			return $def;
		}

	} // end method



}