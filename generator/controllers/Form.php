<?php 

use Generator\DB;

class FormController {
	
	function __construct() {

		switch(route(1)) {
			case "response" : $this->response();
				break;
		}// end if
	
	}

	function response() {
		if(isset($_POST['id'])) {
			$table 		= $_POST['id'];
			$template 	= template('form');
			$form_group = template('form-group');
			$column   = DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");

			$listFormGroup = "";
			for($i=0, $m=count($column); $i<$m; $i++) {
				$listFormGroup .= str_replace(['{{table_name}}', '{{name}}'], [$table, $column[$i]['COLUMN_NAME']], $form_group)."\n";
			}

			$template 	= str_replace("{{form_group}}", $listFormGroup, $template);

			echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			echo $template;
			echo '</textarea>';
		}// end if
	}

}

new FormController();