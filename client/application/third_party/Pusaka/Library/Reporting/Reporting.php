<?php
class Reporting {

	const DataSet 		= 0;
	const DataTable 	= 1;

	private $dataSource;
	private $data;

	function __construct() {
		$this->data 		= array();
		$this->dataSource 	= [
			'objects' 	=> [],
			'tables'	=> []
		];
	}

	function addDataSource($option, $key, $query) {
		$CI 		= &get_instance();
		$result  	= $CI->db->query($query);

		if(!$result) {
			debug($query);
			return False;
		}

		if(!($result->num_rows() > 0)) {
			debug($query);
			return False;
		}// end if

		if($option==0) {
			$value = $result->result_array()[0];
			$this->dataSource['objects'][$key] = $value;
		}else {
			$value = $result->result_array();
			$this->dataSource['tables'][$key] = $value;
		}
		return True;
	}

	function response() {
		echo json_encode($this->dataSource);
	}

}
?>