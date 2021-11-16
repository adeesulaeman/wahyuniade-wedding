<?php 
namespace Pusaka;

class AuthResponse {

	private $status;
	private $data;
	private $input;

	public function __construct($status, $data) {
		$this->status 	= $status;
		$this->data 	= $data;
	}

	public function accept($closure) {
		if($this->status=='accepted') {
			$closure($this);
		}
		return $this;
	}

	public function reject($closure) {
		if($this->status=='rejected') {
			$closure($this);
		}
		return $this;
	}

	public function getData() {
		return $this->data;
	}

	public function input($input) {
		if($this->status=='accepted') {
			$this->input = $input;
		}
		return $this;
	}

	public function equal($compare, $type) {

		if($this->status=='accepted') {
			/*
			* Normal Check [ Pusaka\Auth::NORMAL ]
			*
			*/
			if($type == Auth::NORMAL) {
				if($this->input == $this->data[$compare]) {
					$this->status = 'accepted';
				}else {
					$this->status = 'rejected';
				}
			}else 

			/*
			* Password Check [ Pusaka\Auth::PASSWORD ]
			*
			*/
			if($type == Auth::PASSWORD){
				if(Auth::password($this->input, $this->data[$compare])) {
					$this->status = 'accepted';
				}else {
					$this->status = 'rejected';	
				}
			}

			/*
			* Password Check [ Pusaka\Auth::MD5 ]
			*
			*/
			if($type == Auth::MD5){
				if(md5($this->input) == $this->data[$compare]) {
					$this->status = 'accepted';
				}else {
					$this->status = 'rejected';	
				}
			}

		}

		return $this;

	}

	public function check($closure) {
		if($this->status=='accepted') {
			$closure($this);
		}
		return $this;
	}

}