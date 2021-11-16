<?php 
/* 
Driver 		: mysqli
Author 		: Tom Richard
Copyright   : 2017 - 2019
-----------------------------------------------------------
**/
namespace Pusaka\Library\DataTable\Database;

class Func {

	function upper($key) {
		return " UPPER($key) ";
	}

}