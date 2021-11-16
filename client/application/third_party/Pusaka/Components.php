<?php
namespace Pusaka;

class Components {

	protected $Controller;
	protected $Cwdir;
	protected $CI;

	public function __construct($Controller) {
		$this->Controller 	= $Controller;
		$this->Cwdir 		= $this->Controller->page . '/components/views/';
		$this->CI 			= &get_instance();
	}

}