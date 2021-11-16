<?php
class PrimaryKey {
	
	private $prefix;
	private $lastPrefix;
	private $suffix;
	private $lastSuffix;
	private $number;
	private $lastNumber;
	private $format;
	
	function __construct() {
		$this->format 		= array(
			0, 0, 0
		);
	}//END IF
	
	public function setFormat($pref=0, $num=0, $suff=0) {
		$this->format = array(
			$pref, $num, $suff
		);
	}//END METHOD
	
	public function setPrefix($str) {
		$this->prefix = $str;
	}//END METHOD
	
	public function setSuffix($str) {
		$this->suffix = $str;
	}//END METHOD
	
	public function setNumber($number) {
		$this->number = $number;
	}//END METHOD
	
	public function setLast($stringFormat) {
		$format 			= $this->format;
		$this->lastPrefix	= substr($stringFormat, 0,$format[0]);
		$this->lastNumber	= substr($stringFormat, $format[0],$format[1]);
		$this->lastSuffix	= substr($stringFormat, $format[1]+$format[2]+1,$format[2]);
	}//END METHOD
	
	public function now() {
		return $this->lastPrefix.$this->lastNumber.$this->lastSuffix;
	}//END METHOD
	
	public function next() {

		if($this->prefix==$this->lastPrefix AND $this->suffix==$this->lastSuffix) {
			$number = intval($this->lastNumber)+1;
		}else {
			$number = 0;
		}//else

		$nextNumber 		= '';
		for($i=0, $m=($this->format[1]-strlen($number)); $i<$m; $i++) {
			$nextNumber    .= '0';
		}//end
		$nextNumber    	   .= $number;
		
		$this->lastPrefix = $this->prefix;
		$this->lastSuffix = $this->suffix;
		$this->lastNumber = $nextNumber;

		return $this->prefix.$nextNumber.$this->suffix;
		
	}//END METHOD
	
}//END CLASS