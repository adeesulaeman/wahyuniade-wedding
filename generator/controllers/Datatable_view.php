<?php 

use Generator\DB;

class Datatable_viewController {
	
	function __construct() {

		switch(route(1)) {
			case "response" : $this->response();
				break;
			// case "export" 	: $this->export();
			// 	break;
			// case "download" : $this->download();
			// 	break;
			default : $this->response();
				break;
		}// end if
	
	}


	function response() {
		if(isset($_POST['id'])) {


			$t 			= array();
			$t["head"]	= 	'<tr>
				              	<th></th>
				              	{{table_head_column}}
				            </tr>
				           	<tr>
				              	<th></th>
				              	{{table_input_search}}
				           	</tr>';

			$table_head 		= '';
			$table_input_search = '';
			$table_head_column  = '';


			$table 		= $_POST['id'];
			$column   	= DB::execute_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$table';");

			$listEntities 	= "";
			$first 			= "";
			$field 			= array();
			for($i=0, $m=count($column); $i<$m; $i++) {
				$first 			 	 	 = $column[0]['COLUMN_NAME'];
				$lang 					 = '<?=$lang->line(\'entities_'.$table.'_'.$column[$i]['COLUMN_NAME'].'\')?>';
				$table_input_search  	.= '<th class="insearch-head"><input name="'.$column[$i]['COLUMN_NAME'].'"          dtpart="searchadvance" class="form-control" placeholder="'.$lang.'..."   /></th>'."\r\n";
				$table_head_column  	.= '<th>'.$lang.'</th>'."\r\n";
				$field[] 		 	 	 = '<td onclick="formCtrl.openedit(\'`+row.'.$first.'+`\')">`+row.'.$column[$i]['COLUMN_NAME'].'+`</td>';
			}

			$listEntities 	= implode("\r\n", $field);

			$table_head 	= str_replace('{{table_input_search}}', $table_input_search, $t["head"]);
			$table_head 	= str_replace('{{table_head_column}}', 	$table_head_column, $table_head);

			$template 	= template('datatable-view');

			$template 	= str_replace( [
					"{{table_head}}",
					"{{table_name}}", 
					"{{table_column}}", 
					"{{first_column}}",
					"{{table_name_ucfirst}}",
					"{{table_name_lcfirst}}",
					"{{table_name_ucall}}",
					"{{table_name_lcall}}"
				], [
					$table_head,
					$table, 
					$listEntities, 
					$first,
					ucfirst(strtolower($table)),
					lcfirst(strtolower($table)),
					strtoupper($table),
					strtolower($table)
				], $template );
			
			echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			echo $template;
			echo '</textarea>';

			// echo '<div class="row" style="text-align:left;">';
			// echo '	<div class="col-md-12" style="padding: 20px;">';
			// echo '		<button class="btn btn-primary" onclick="export_entities(\''.$table.'\');">Export</button>';
			// echo '	</div>';
			// echo '</div>';

			// echo '<textarea class="form-control" style="max-width: 100%; height: 500px; font-size: 12px; overflow-x: scroll;">';
			// echo "<?php defined('BASEPATH') OR exit('No direct script access allowed');\r\n";
			// echo $listEntities;
			// echo '</textarea>';
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

new Datatable_viewController();