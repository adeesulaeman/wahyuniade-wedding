<?php 

use Generator\DB;

class EntitiesController {
	
	function __construct() {

		switch(route(1)) {
			case "response" : $this->response();
				break;
			case "export" 	: $this->export();
				break;
			case "download" : $this->download();
				break;
		}// end if
	
	}


	function response() {
		if(isset($_POST['id'])) {

			$table 		= $_POST['id'];
			// SqlServer
			//$column   	= DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");
			// Mysql
			$column   	= DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");
			
			$listEntities = "";
			for($i=0, $m=count($column); $i<$m; $i++) {
				$listEntities .= '$lang[\'entities_'.$table.'_'.$column[$i]['COLUMN_NAME'].'\'] = \''.$column[$i]['COLUMN_NAME'].'\';'."\n";
			}

			echo '<div class="row" style="text-align:left;">';
			echo '	<div class="col-md-12" style="padding: 20px;">';
			echo '		<button class="btn btn-primary" onclick="export_entities(\''.$table.'\');">Export</button>';
			echo '	</div>';
			echo '</div>';

			echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			echo "<?php defined('BASEPATH') OR exit('No direct script access allowed');\r\n";
			echo $listEntities;
			echo '</textarea>';
		}// end if
	}

	function export() {

		if(isset($_POST['id'])) {

			$table 		= $_POST['id'];
			$column   	= DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");

			$listEntities = "";
			for($i=0, $m=count($column); $i<$m; $i++) {
				$listEntities .= '$lang[\'entities_'.$table.'_'.$column[$i]['COLUMN_NAME'].'\'] = \''.$column[$i]['COLUMN_NAME'].'\';'."\n";
			}

			$path 		= "storage/entities/";
			$filename 	= strtolower($table).'_lang.php';

			$save 		= $path.$filename;

			$fop 	= fopen($save, "w") or die("Unable to open file!");
			$txt 	 = "<?php defined('BASEPATH') OR exit('No direct script access allowed');\r\n";
			$txt 	.= $listEntities;
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

new EntitiesController();