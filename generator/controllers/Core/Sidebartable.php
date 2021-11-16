<?php

use Generator\DB;

class Sidebartable {

	function __construct() {
		switch(route(1)) {
			default : $this->response();
				break;
		}// end if

	}

	function response() {
		if(isset($_POST['tablesearch'])) {

			$search = $_POST['tablesearch'];

			if($search=='') {
				$where = "1=1";
			}else {
				$where = "UPPER(TABLE_NAME) LIKE UPPER('%$search"."%')";
			}

			$Tables = DB::execute_query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='beasiswa_db' AND $where");

			for($i=0, $m=count($Tables); $i<$m; $i++) {
				 echo
				 '
				 <li onclick="stc(\''.$Tables[$i]['TABLE_NAME'].'\', this)">
					  <a><i class="fa fa-table fa-fw"></i> '.$Tables[$i]['TABLE_NAME'].'</a>
				 </li>
				 ';
			}

		}// end if
	}

}

new Sidebartable();
