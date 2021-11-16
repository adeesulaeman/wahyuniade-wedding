<?php
namespace Pusaka\Library;

class ScriptEngine {
	
	private $script;
	private $error;

	function __constructor() {
		$this->script = '';
	}

	function setScript($script) {
		$this->script = $script;
	}

	function allowed() {

		$patternNotAllowed = "(function|while|for|if)";

		$countOfMatch = preg_match(trim($patternNotAllowed), $this->script);
		
		if($countOfMatch<=0) {
			return True;
		}else {
			return False;
		}

	}

	function iserror() {
		if(!empty($this->error)) {
			return True;
		}else {
			return False;
		}
	}

	function compile() {
		
		if(!$this->allowed()){
			return '';
		}

		if($this->script==='' OR $this->script===NULL){
			return '';
		}
		$res = @eval('return '.$this->script.';');
		if(error_get_last()) {
			$this->error = "Error Script";
			return '';
		}else {
			return $res;
		}
	}

	function clear() {
		$this->script = '';
	}
	
}//END CLASS