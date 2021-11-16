<?php

use Generator\DB;

class ModelController {

	function __construct() {

		switch(route(1)) {
			case "response" : $this->response();
				break;
			case "export" 	: $this->export();
				break;
			case "download" : $this->download();
				break;
			default : $this->response();
				break;
		}// end if

	}

	function __DATA($table) {

			$column   	= DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");

			$listEntities 	= "";
			$first 			= "";
			$field 					= array();
			$table_column 			= array();
			$table_column_insert	= array();
			$table_value_insert		= array();

			$table_column_update 	= array();

			for($i=0, $m=count($column); $i<$m; $i++) {
				$first 			 		= $column[0]['COLUMN_NAME'];
				$field[] 		 		= "'".$column[$i]['COLUMN_NAME']."' => '".$column[$i]['COLUMN_NAME']."'"."\n";
				$table_column[]  		= "'".$column[$i]['COLUMN_NAME']."'";
				$table_column_insert[]	= $column[$i]['COLUMN_NAME'];
				$table_value_insert[] 	= '?';
				if ($column[$i]['COLUMN_NAME'] != 'TimeStamp') {
					$table_column_update[] 	= $column[$i]['COLUMN_NAME'].'=?';
				}
			}
			$listEntities 	= implode(",", $field);
			$table_column 	= implode("\n\t,", $table_column);
			$table_column_insert 	= implode("\n\t\t\t\t\t\t,", $table_column_insert);
			$table_value_insert 	= implode(",", $table_value_insert);
			$table_column_update	= implode("\n\t\t\t\t\t\t,", $table_column_update);

			$template 	= template('model');

			$template 	= str_replace( [
					"{{table_name}}",
					"{{table_column}}",
					"{{table_column_insert}}",
					"{{table_value_insert}}",
					"{{table_column_update}}",
					"{{first_column}}",
					"{{table_name_ucfirst}}",
					"{{table_name_lcfirst}}",
					"{{table_name_ucall}}",
					"{{table_name_lcall}}"
				], [
					$table,
					$table_column,
					$table_column_insert,
					$table_value_insert,
					$table_column_update,
					$first,
					ucfirst(strtolower($table)),
					lcfirst(strtolower($table)),
					strtoupper($table),
					strtolower($table)
				], $template );

			return [
				"table" 	=> $table,
				"template"	=> $template
			];
	}

	function response() {
		if(isset($_POST['id'])) {

			$response = $this->__DATA($_POST['id']);

			echo '<div class="row" style="text-align:left;">';
			echo '	<div class="col-md-12" style="padding: 20px;">';
			echo '		<button class="btn btn-primary" onclick="export_model(\''.$response['table'].'\');">Export</button>';
			echo '	</div>';
			echo '</div>';

			echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			echo $response['template'];
			echo '</textarea>';

			// echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			// echo "<?php defined('BASEPATH') OR exit('No direct script access allowed');\r\n";
			// echo $listEntities;
			// echo '</textarea>';
		}// end if
	}

	function export() {

		if(isset($_POST['id'])) {

			$table 		= $_POST['id'];

			$response 	= $this->__DATA($table);

			$path 		= "storage/models/";
			$filename 	= ucfirst(strtolower($table)).'.php';

			$save 		= $path.$filename;

			$fop 	 	= fopen($save, "w") or die("Unable to open file!");
			$txt 	 	= $response['template'];
			fwrite($fop, $txt);
			fclose($fop);

			echo $save;

		}

	}

	function download() {
		if(isset($_GET['download'])) {
			force_download($_GET['download']);
		}
	}

}

new ModelController();
