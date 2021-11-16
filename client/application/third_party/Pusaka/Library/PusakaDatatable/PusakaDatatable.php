<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('PusakaDatatableConfig.php');
require_once('Driver/'.$GLOBALS['pusaka']['datatable']['driver'].'.php');

class PusakaDatatable {

	//---------------------------------//
	// Data
	//---------------------------------//
	private $id; 			// -> Id datatable
	private $url; 			// -> Url action (get json)
	private $column;		// -> Column view name
	private $cell;
	private $piece;
	private $class;

	// Databse
	private $query; 		// -> Query
	private $attribute; 	// -> Attribute Database
	private $aliases; 		// -> Attribute Aliases
	private $table;
	private $limit;
	private $order;
	private $mode;

	private $post;
	private $debug;
	private $db;

	private $driverSql;

	function __construct($id) {
		$this->post = [
			"currentPage" 	=> "currentPage",
			"search"		=> "search",
			"sort" 			=> ""
		];
		$this->exData 	= array();
		$this->id 		= $id;
		$this->mode 	= "AUTO";
		$this->debug 	= FALSE;
		$this->db 		= 0;
		$this->driverSql= new $GLOBALS['pusaka']['datatable']['driver'];
		$this->evTrigger= 1;
	}//END METHOD

	private function __syspath() {
		return $GLOBALS['pusaka']['datatable']['path'];
	}

	public function selectDB($option) {
		$this->db = $option;
	}//END METHOD


	public function getSelectedDB() {
		return $this->db;
	}//END METHOD

	public function auto() {
		$this->mode  = "AUTO";
	}//END METHOD

	public function manual() {
		$this->mode  = "MANUAL";
	}//END METHOD

	public function debug() {
		$this->debug = TRUE;
	}//END METHOD

	// VIEW
	//------------------------------------------------------------
	public function getUrlResource($file) {
		return $GLOBALS['pusaka']['datatable']['resource']."Datatable/Resource/".$file;
		// return Url::base_url()."sys_security/download/".Code::encrypt(
		// 	$this->__syspath()."Resource/".$file
		// );
	}

	public function setId( $id ) {
		$this->id = $id;
	}//END METHOD

	public function getId() {
		return $this->id;
	}//END METHOD

	public function setUrl( $url ) {
		$this->url = $url;
	}//END METHOD

	public function getUrl() {
		return $this->url;
	}

	public function setColumn( $column ) {
		$this->column = $column;
	}//END METHOD

	public function getColumn() {
		return $this->column;
	}

	public function addAllClass($classes) {
		$this->class = $classes;
	}

	public function addClass($key, $value) {
		$this->class[$key] = $value;
	}

	public function getClass($key) {
		if(isset($this->class[$key])) {
			return $this->class[$key];
		}else {
			return NULL;
		}
	}

	public function setCell($idx, $cell) {
		$this->cell[$idx] = $cell;
	}

	public function getCell($idx) {
		if(isset($this->cell[$idx])) {

			$cell 	= $this->cell[$idx];

			// -> attribute
			$in 	= $cell;
			$out 	= array();
			$cmatch = preg_match_all("/{\(data\.[\w]*\)}/", $in, $out);
			if($cmatch>0) {
				for($i=0; $i<$cmatch; $i++) {
					$attr = str_replace(array("{(", ")}", "data"), array("", "", "DATA[i]"), $out[0][$i]);
					//$attr = str_replace("data", "DATA[i]", $attr);
					$cell = str_replace($out[0][$i], "'+".$attr."+'", $cell);
				}//END FOR
			}

			// -> javascript code
			$in 	= $cell;
			$out 	= array();
			$cmatch = preg_match_all("/{\([\s|\w|\W]*\)}/", $in, $out);
			if($cmatch>0) {
				for($i=0; $i<$cmatch; $i++) {
					$jscode = str_replace(array("{(", ")}"), array("", ""), $out[0][$i]);
					//$attr = str_replace("data", "DATA[i]", $attr);
					$cell 	= str_replace($out[0][$i], "'+".$jscode."+'", $cell);
				}//END FOR
			}

			// -> quote
			$cell = str_replace(
				"^q;", "\'",
				$cell
			);

			return $cell;
		}else {
			return NULL;
		}
	}

		public function getColumnView() {

			$head = $this->piece["HEAD"];

			$str  = "";
			foreach ($this->column as $key => $value) {
				if(preg_match("/#\d{1,}/", $key)>=1) {
					foreach ($value as $k => $v) {
						$str  .= str_replace("{(sort)}", '',str_replace("{(thead)}", $v, $head));
						break;
					}
				}else {
					$vh 	  = str_replace("{(sort)}", 'ssort-for_'.$this->getId().'="'.$key.'"'. 'ssort-to_'.$this->getId().'="N"',str_replace("{(thead)}", $value, $head));
					$str 	 .= str_replace("{(class)}", (($this->getClass($key)!==NULL)?$this->getClass($key):''), $vh);
				}
			}
			return $str;

		}//END METHOD

		public function getRowView() {

			$body = $this->piece["BODY"];

			$str  = "";
			foreach ($this->column as $key => $value) {
				$idx = $key;
				/*
					setCell( #1, #2
				*/
				if(preg_match("/#\d{1,}/", $key)>=1) {
					foreach ($value as $k => $v) {
						if(($cell = $this->getCell($idx))!==NULL) {
							// Cell Template
							$str  .= $this->getCell($idx);
						}else {
							$class = $this->getClass($key);
							if($class!==NULL) {
								$class = 'class="'.$class.'"';
							}else {
								$class = "";
							}
							$str  .= "<td ".$class." >'+DATA[i].".$k."+'</td>";
						}
						break;
					}
				}

				else {
					/* setCell('Attribute') */
					if(($cell = $this->getCell($idx))!==NULL) {
						// Cell Template
						$str  .= $this->getCell($idx);
					}else {
						$class = $this->getClass($key);
						if($class!==NULL) {
							$class = 'class="'.$class.'"';
						}else {
							$class = "";
						}
						$str .= "<td ".$class." >'+DATA[i].".$key."+'</td>";
					}
				}
			}
			$str  = "'".trim(str_replace("{(tbody)}", $str, $body))."'";
			return $str;

		}//END METHOD

	private function loadTemplate() {
		$list = array(
			"{(search)}" 			=> "sinp-srch_".$this->getId(),
			"{(page)}" 				=> "slbl-page_".$this->getId(),
			"{(prev)}" 				=> "sbtn-prev_".$this->getId(),
			"{(next)}" 				=> "sbtn-next_".$this->getId(),
			"{(number)}"			=> "sinp-numb_".$this->getId(),
			"{(head)}"				=> "shead_".$this->getId(),
			"{(body)}"				=> "sbody_".$this->getId()
		);

		$file = $this->__syspath()."Template/default/template.tpl.php";

		$this->piece["MAIN"] = "";
		$this->piece["HEAD"] = "";
		$this->piece["BODY"] = "";

		if(file_exists($file)) {
			$contents = file_get_contents($file);
			foreach ($list as $key => $value) {
				$contents = str_replace($key, $value, $contents);
			}//END FOREACH

			// Load MAIN Template
			$match  = array();
			$cmatch = preg_match_all("/\[BEGIN:MAIN\][.?|\W?|\w?]*\[END:MAIN\]/", $contents, $match);
			if($cmatch>0) {
				$this->piece["MAIN"] = str_replace(array("[BEGIN:MAIN]", "[END:MAIN]"), "", $match[0][0]);
			}//END

			// Load HEAD Template
			$match  = array();
			$cmatch = preg_match_all("/\[BEGIN:HEAD\][.?|\W?|\w?]*\[END:HEAD\]/", $contents, $match);
			if($cmatch>0) {
				$this->piece["HEAD"] = str_replace(array("[BEGIN:HEAD]", "[END:HEAD]"), "", $match[0][0]);
			}//END

			// Load BODY Template
			$match  = array();
			$cmatch = preg_match_all("/\[BEGIN:BODY\][.?|\W?|\w?]*\[END:BODY\]/", $contents, $match);
			if($cmatch>0) {
				$this->piece["BODY"] = str_replace(array("[BEGIN:BODY]", "[END:BODY]"), "", $match[0][0]);
			}//END

		}//END IF

		// Head, Body
		$this->piece["MAIN"] = str_replace("{(thead_content)}", $this->getColumnView(), $this->piece["MAIN"]);

		$this->piece["MAIN"] = str_replace("{(tbody_content)}", "", $this->piece["MAIN"]);

	}

	 function loadCss() {
		$file 		= $this->__syspath()."Template/default/style.css.php";

		$list = array(
		);

		$contents 	= "";
		if(file_exists($file)) {
			$contents 	= file_get_contents($file);
			$contents 	= preg_replace("/<\?php.*\?>/", "", $contents);
			foreach ($list as $key => $value) {
				$contents = str_replace($key, $value, $contents);
			}//END FOREACH
		}else {
			//echo("cannot find template .css !");
		}

		$resource  = "/\{\(resource=\".*\"\)\}/";

		// Load CSS
		$match  = array();
		$cmatch = preg_match_all($resource, $contents, $match);
		if($cmatch>0) {
			for($i=0; $i<$cmatch; $i++) {
				$value 	  = str_replace(array("{(", "resource=", "\"", ")}"), "", $match[0][$i]);
				$value 	  = $this->getUrlResource($value);
				$contents = str_replace($match[0][$i], $value, $contents);
			}//END FOR
		}//END

		return PusakaDatatable::minify($contents, array("CSS") );

	}//END METHOD

	private static function minify( $buffer, $types = array("HTML") ) {

		// -> HTML
		if( in_array("HTML", $types, true) ) {
			$search = array(
				'/\>[^\S ]+/s',     // strip whitespaces after tags, except space
				'/[^\S ]+\</s',     // strip whitespaces before tags, except space
				'/(\s)+/s',         // shorten multiple whitespace sequences
				'/<!--(.|\s)*?-->/' // Remove HTML comments
			);

			$replace = array(
				'>',
				'<',
				'\\1',
				''
			);
			$buffer = preg_replace($search, $replace, $buffer);
		}//END IF

		// -> CSS
		if( in_array("CSS", $types, true) ) {
			/* remove comments */
			$buffer = str_replace('; ',';',str_replace(' }','}',str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$buffer)))));
			//$buffer = preg_replace( '/*[^*]**+([^/][^*]**+)*/', '', $buffer );
			/* remove tabs, spaces, newlines, etc. */
			//$buffer = str_replace( array("rn", "r", "n", "t", '  ', '    ', '    '), '', $buffer );
    	}//END IF

		return $buffer;

	}//END METHOD

	public function request() {
		$this->loadTemplate();
		echo $this->piece["MAIN"];
		$this->event();
	}

	// DATA MANIPULATE
	//-----------------------------------------------------------
	public function setAttribute( $attribute , $table = "") {
		$this->attribute = $attribute;
		$this->table 	 = $table;
	}

	public function getAttribute() {
		return $this->attribute;
	}

	public function setLimit( $limit ) {
		$this->limit = $limit;
	}

	public function setOrder( $order ) {
		// ASC | DESC
		/* array(
			"some_attribute" => "ASC" | "DESC"
		)
		*/
		$this->order = $order;
	}

	public function setAliases($aliases) {
		$this->aliases = $aliases;
	}

	public function getOrder() {
		return $this->order();
	}

	public function setQuery($queryData, $queryRow) {
		$this->query = array(
			$queryData,
			$queryRow
		);
	}

	private $scriptOnSuccess;

	public function setScriptOnSuccess($script) {
		$this->scriptOnSuccess = $script;
	}

	public function getScriptOnSuccess() {
		return $this->scriptOnSuccess;
	}

	private $exData;

	public function addExData($key, $value) {
		$this->exData[$key] = $value;
	}

	public function getExData($key) {
		return $this->exData[$key];
	}

	public function renderExData() {
		return json_encode($this->exData);
	}

	private $whereClause;

	public function setWhereClause($where) {
		$this->whereClause = " AND (".$where.")";
	}

	public function getWhereClause() {
		return $this->whereClause;
	}

//------------------------------------------------------------------
// -> QUERY
//------------------------------------------------------------------
	public function getQueryManual() {

		$queryBuild 	= $this->query[0];
		$countBuild 	= $this->query[1];

		// Search Set
		//------------------------------------------------
			$search 		= "";
			$querySearch 	= "";
			if(isset($_POST['search'])) {
				if($_POST['search']!="") {
					$search 			= $_POST['search'];
					$c 				= count($this->attribute)-1;
					$i 				= 0;
					foreach ($this->attribute as $key => $value) {
						$querySearch .= $this->driverSql->uppercase($key)." LIKE '%".strtoupper($search)."%'";
						$querySearch .= ($i<$c)?" OR ":"";
						$i++;
					}//END IF
				}//END IF
			}//END IF

			// Replace => {(search)}
			$querySearch = ($querySearch=="")?"":" AND (".$querySearch.") ";
			$queryBuild  = str_replace("{(search)}", $querySearch, $queryBuild);
			$countBuild  = str_replace("{(search)}", $querySearch, $countBuild);
		//-------------------------------------------------

		// Order Set
		$sort 			= $this->order;
		if(isset($_POST['sort'])) {
			if(count($_POST['sort'])>0) {
				$sort  	= array();
				foreach ($_POST['sort'] as $key => $value) {
					$attr_key = array_search($key, $this->attribute);
					if(in_array($value, array("ASC", "DESC"))) {
						$sort[$attr_key] = $value;
					}
				}//END FOREACH
			}//END IF
		}//END IF

		// Limit Set
		if($this->limit!='*') {
			$limit 			= ($this->limit !== NULL)? $this->limit : 20; // 20 default
			$currentPage 	= (isset($_POST[$this->post["currentPage"]]))? $_POST[$this->post["currentPage"]] : 1;

			$StartIndex1 	 = ($currentPage-1) * $limit;
			$StartIndex2 	 = ($currentPage) 	* $limit;
		}
		//-----------------------------------------------------------
		//$SQL 			 	= new Sql($this->db);

		//$query['row'] 	= $SQL->add($queryBuild)->order($sort)->limit($StartIndex1, $limit)->get();
		//$SQL->clear();
		//$query['count'] 	= $SQL->add($countBuild)->get();
		//return $query;
		//$query['row'] 	= $queryBuild.call_user_func($this->driverSql.'::order', $sort, '').call_user_func($this->driverSql.'::limit', $StartIndex1, $limit);
		
		$queryRow 		 = $queryBuild;
		if($this->limit!='*') {
			$queryRow 		.= $this->driverSql->order($sort, '').$this->driverSql->limit($StartIndex1, $limit);
		}

		$query['row'] 	 = $queryRow;
		//$SQL->clear();
		$query['count']  = $countBuild;
		return $query;

	}

	public function getQueryAuto() {

		$field 			= "";
		$table 			= $this->table;

		$i = 1;
		$c = count($this->attribute);
		foreach ($this->attribute as $key => $value) {
			$field 		.= " ".$key." AS ".$value;
			$field 		.= ($i<$c)? "," : "" ;
			$i++;
		}//END FOREACH

		$queryBuild 	= "SELECT ".$field." FROM ".$table." WHERE 1=1 {(search)} ".$this->getWhereClause();
		$countBuild 	= "SELECT COUNT(*) as COUNT FROM ".$table." WHERE 1=1 {(search)} ".$this->getWhereClause();

		// Search Set
		//------------------------------------------------
			$search 		= "";
			$querySearch 	= "";
			if(isset($_POST['search'])) {
				if($_POST['search']!="") {
					$search 		= $_POST['search'];
					$c 				= count($this->attribute)-1;
					$i 				= 0;
					foreach ($this->attribute as $key => $value) {
						$querySearch .= $this->driverSql->uppercase($key)." LIKE '%".strtoupper($search)."%'";
						$querySearch .= ($i<$c)?" OR ":"";
						$i++;
					}//END IF
				}//END IF
			}//END IF

			// Replace => {(search)}
			$querySearch = ($querySearch=="")?"":" AND (".$querySearch.") ";
			$queryBuild  = str_replace("{(search)}", $querySearch, $queryBuild);
			$countBuild  = str_replace("{(search)}", $querySearch, $countBuild);
		//-------------------------------------------------

		// Order Set
		$sort 			= $this->order;
		if(isset($_POST['sort'])) {
			if(count($_POST['sort'])>0) {
				$sort  	= array();
				foreach ($_POST['sort'] as $key => $value) {
					$attr_key = array_search($key, $this->attribute);
					if(in_array($value, array("ASC", "DESC"))) {
						$sort[$attr_key] = $value;
					}
				}//END FOREACH
			}//END IF
		}//END IF

		// Limit Set
		$limit 			= ($this->limit !== NULL)? $this->limit : 20; // 20 default
		$currentPage 	= (isset($_POST[$this->post["currentPage"]]))? $_POST[$this->post["currentPage"]] : 1;

		$StartIndex1 	 = ($currentPage-1) * $limit;
		$StartIndex2 	 = ($currentPage) 	* $limit;

		//-----------------------------------------------------------
		//$SQL 			 = new Sql($this->db);
		//$query['row'] 	= $queryBuild.call_user_func($this->driverSql.'::order', $sort).call_user_func($this->driverSql.'::limit', $StartIndex1, $limit);
		
		$query['row'] 	= $queryBuild.$this->driverSql->order($sort, '').$this->driverSql->limit($StartIndex1, $limit);
		//$SQL->clear();
		$query['count'] = $countBuild;
		return $query;

	}

	private $updateResponse;

	public function setResponse($response) {
		$this->updateResponse = $response;
	}

	public function getResponse() {
		echo json_encode($this->updateResponse);
	}

	public function response($return = false) {

		$CI 		= &get_instance();

		//$Database   = new Database($this->db);

		$Query 		= ($this->mode=="AUTO")?$this->getQueryAuto():$this->getQueryManual();

		$Count 		= $CI->db->query($Query['count']);
		$Count 		= $Count->result_array();
		$Count 		= (isset($Count[0]['COUNT']))?$Count[0]['COUNT']:0;
		$Rows       = $CI->db->query($Query['row']);
		$Rows 		= $Rows->result_array();
		
		$currentPage 	= (isset($_POST[$this->post["currentPage"]]))? $_POST[$this->post["currentPage"]] : 1;
		if($this->limit!='*'){
			$totalPage 		= floor($Count/$this->limit);
			$totalPage 		= ((($Count % $this->limit)!=0)?($totalPage+=1):$totalPage);
		}else {
			$totalPage 		= 1; 			
		}

		$e = "";
		if($this->debug) {
			$e = array(
				"db_error" 		=> $CI->db->error(),
				"query_data" 	=> preg_replace("/[\r|\t]/", "", preg_replace("/[\n]/", " ", $Query['row'])),
				"query_count"	=> preg_replace("/[\r|\t]/", "", preg_replace("/[\n]/", " ", $Query['count']))
			);
		}

		if($return) {
			return array(
				"E_CODE" => 0,
				"E_MSG"  => $e,
				"DATA" 	 => $Rows,
				"currentPage" => $currentPage,
				"totalPage"   => $totalPage
			);
		}//END IF

		echo json_encode(array(
			"E_CODE" => 0,
			"E_MSG"  => $e,
			"DATA" 	 => $Rows,
			"currentPage" => $currentPage,
			"totalPage"   => $totalPage
		));
	}

	const WAIT 		= 0;
	const STARTUP 	= 1;

	private $evTrigger;

	public function trigger($ev = 1) {
		switch($ev){
			case 0: $this->evTrigger = 0;
				break;
			case 1: $this->evTrigger = 1;
				break;
			default: break;
		}
	}

	public function event() {
		?>

		<script type="text/javascript">

			class <?="CDT".$this->getId();?>  {

				constructor() {

					var exdataEncode = '<?=$this->renderExData();?>';
					var exdataDecode = JSON.parse(exdataEncode);

					this.url 	= "<?=$this->getUrl();?>";
					this.id 	= "<?=$this->getId();?>";
					this.data  	= {
						<?=$this->getId();?> : "",
						currentPage : 1,
						totalPage 	: 0,
						search 		: "",
						sort 		: {},
						exdata 		: exdataDecode 
					};
					this.addEventNumber(this.id);
					this.addEventSearch(this.id);
					this.addEventSort(this.id);
					<?php if($this->evTrigger==PusakaDatatable::STARTUP): ?>
						this.getData();
					<?php endif; ?>
				}//END CONSTRUCT

				addPostData(key, data) {
					this.data['DT_'+ key] = data;
				}

				removePostData(key) {
					var idx = this.data.indexOf('DT_' + key);
					if(idx!=-1) {
						this.data.splice(idx, 1);
					}
				}

				addEventNumber(id) {
					let ref = this; // Reference Class
					// Button Next Click
					$(".sbtn-next_"+id).click(function(){
						if( ref.data.currentPage < ref.data.totalPage ){
							ref.data.currentPage = Number(ref.data.currentPage) + 1;
							ref.getData();
						}//END IF
					});

					// Button Prev Click
					$(".sbtn-prev_"+id).click(function(){
						if( ref.data.currentPage > 1 ){
							ref.data.currentPage -= 1;
							ref.getData();
						}//End If
					});
					// Input Number Change
					$(".sinp-numb_"+id).change(function(){
						if($(this).val()>0 && $(this).val()<=ref.data.totalPage){
							ref.data.currentPage = $(this).val();
							ref.getData();
						}//END IF
					});
				}//END METHOD

				addEventSearch(id) {
					let ref = this;
					// -> Search
					// Input Search Change
					$(".sinp-srch_"+id).change(function(){
						// <?=$this->getId()."\n";?>
						// alert(ref.id);
						ref.data.currentPage = 1;
						ref.data.search 	 = $(this).val();
						ref.getData();
					});
				}//END METHOD

				addEventSort(id) {
					let ref = this;
					$(".shead_"+id+" th[ssort-for_"+id+"]").click(function(){
						var attr = $(this).attr("ssort-for_"+id);
						// N, A, D
						var sort = $(this).attr("ssort-to_"+id);
						if(sort!=undefined || sort=="N" ) {
							$(this).attr("ssort-to_"+id, "A");
							$(this).removeClass("sort_both");
							$(this).removeClass("sort_desc");
							$(this).addClass("sort_asc");
							ref.data.sort[attr] = "ASC";
						}
						if(sort=="A") {
							$(this).attr("ssort-to_"+id, "D");
							$(this).removeClass("sort_both");
							$(this).removeClass("sort_asc");
							$(this).addClass("sort_desc");
							ref.data.sort[attr] = "DESC";
						}
						if(sort=="D") {
							$(this).attr("ssort-to_"+id, "N");
							$(this).removeClass("sort_desc");
							$(this).removeClass("sort_asc");
							$(this).addClass("sort_both");
							delete ref.data.sort[attr];
						}//END IF
						ref.getData();
					});
				}//END METHOD

				addRow(DATA) {
					let ref  = this;
					var html = "";
					for(var i=0, m=DATA.length; i<m; i++) {
						html += <?=$this->getRowView();?>;
					}//END FOR
					$(".sbody_"+ref.id).html(html);
				}

				getData() {
					let ref = this;
					$.ajax({
						type :"POST",
						data :ref.data,
						url  :ref.url,
						dataType: "json",
						success:function(response) {
							ref.data.currentPage 	= response.currentPage;
							ref.data.totalPage 		= response.totalPage;
							$(".sinp-numb_"+ref.id).val(ref.data.currentPage);
							$(".slbl-page_"+ref.id).html('Page : '+ref.data.currentPage+'/'+ref.data.totalPage);
							ref.addRow(response.DATA);
							<?=$this->getScriptOnSuccess();?>
						}
					});
				}//END METHOD

			}//END CLASS

			var <?="DT".$this->getId();?> = new <?="CDT".$this->getId();?>();

		</script>
		<script type="text/javascript">
			$("head").append('<style id="css_<?=$this->getId();?>" type="text/css"><?=$this->loadCss();?></style>');
		</script>
		<?php
	}


	/*

	public function event() {
		?>

		<script type="text/javascript">

			var <?="DT".$this->getId();?> = function() {

				this.constructor = function() {
					this.url 	= "<?=$this->getUrl();?>";
					this.id 	= "<?=$this->getId();?>";
					this.data  	= {
						<?=$this->getId();?> : "",
						currentPage : 1,
						totalPage 	: 0,
						search 		: "",
						sort 		: {}
					};
					this.addEventNumber(this.id);
					this.addEventSearch(this.id);
					this.addEventSort(this.id);
					ref.getData();
				}//END CONSTRUCT

				this.addEventNumber = function(id) {
					ref = this; // Reference Class
					// Button Next Click
					$(".sbtn-next_"+id).click(function(){
						if( ref.data.currentPage < ref.data.totalPage ){
							ref.data.currentPage = Number(ref.data.currentPage) + 1;
							ref.getData();
						}//END IF
					});

					// Button Prev Click
					$(".sbtn-prev_"+id).click(function(){
						if( ref.data.currentPage > 1 ){
							ref.data.currentPage -= 1;
							ref.getData();
						}//End If
					});
					// Input Number Change
					$(".sinp-numb_"+id).change(function(){
						if($(this).val()>0 && $(this).val()<=ref.data.totalPage){
							ref.data.currentPage = $(this).val();
							ref.getData();
						}//END IF
					});
				}//END METHOD

				this.addEventSearch = function(id) {
					ref = this;
					// -> Search
					// Input Search Change
					$(".sinp-srch_"+id).change(function(){
						// <?=$this->getId()."\n";?>
						alert(ref.id);
						ref.data.currentPage = 1;
						ref.data.search 	 = $(this).val();
						ref.getData();
					});
				}//END METHOD

				this.addEventSort = function(id) {
					ref = this;
					$(".shead_"+id+" th[ssort-for_"+id+"]").click(function(){
						var attr = $(this).attr("ssort-for_"+id);
						// N, A, D
						var sort = $(this).attr("ssort-to_"+id);
						if(sort!=undefined || sort=="N" ) {
							$(this).attr("ssort-to_"+id, "A");
							$(this).removeClass("sort_both");
							$(this).removeClass("sort_desc");
							$(this).addClass("sort_asc");
							ref.data.sort[attr] = "ASC";
						}
						if(sort=="A") {
							$(this).attr("ssort-to_"+id, "D");
							$(this).removeClass("sort_both");
							$(this).removeClass("sort_asc");
							$(this).addClass("sort_desc");
							ref.data.sort[attr] = "DESC";
						}
						if(sort=="D") {
							$(this).attr("ssort-to_"+id, "N");
							$(this).removeClass("sort_desc");
							$(this).removeClass("sort_asc");
							$(this).addClass("sort_both");
							delete ref.data.sort[attr];
						}//END IF
						ref.getData();
					});
				}//END METHOD

				this.addRow = function(DATA) {
					ref = this;
					var html = "";
					for(var i=0, m=DATA.length; i<m; i++) {
						html += <?=$this->getRowView();?>;
					}//END FOR
					$(".sbody_"+ref.id).html(html);
				}

				this.getData = function() {
					ref = this;
					$.ajax({
						type :"POST",
						data :ref.data,
						url  :ref.url,
						dataType: "json",
						success:function(response) {
							ref.data.currentPage 	= response.currentPage;
							ref.data.totalPage 		= response.totalPage;
							$(".sinp-numb_"+ref.id).val(ref.data.currentPage);
							$(".slbl-page_"+ref.id).html('Page : '+ref.data.currentPage+'/'+ref.data.totalPage);
							ref.addRow(response.DATA);
							<?=$this->getScriptOnSuccess();?>
						}
					});
				}//END METHOD

				this.constructor();

			}//END CLASS

			<?="DT".$this->getId();?> = new <?="DT".$this->getId();?>();

		</script>
		<script type="text/javascript">
			$("head").append('<style id="css_<?=$this->getId();?>" type="text/css"><?=$this->loadCss();?></style>');
		</script>
		<?php
	}
	*/

}
