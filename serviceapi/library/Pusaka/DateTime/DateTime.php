<?php
namespace Pusaka\Library;

class DateTime extends \DateTime {

	private $config;

	function __construct() {
		parent::__construct();
		$this->config = \Pusaka\Config\Config::DateTime();
	}

	public function current() {
		if(isset($this->config['default_format'])) {
			return date($this->config['default_format']);
		}else {
			return date('Y-m-d H:i:s');
		}
	}

	public static function now() {
		$config = \Pusaka\Config\Config::DateTime();
		return date($config['default_format']);
	}

	public static function dtformat($format) {
		return date($format);
	}

}
?>