<?php
class MysqlDriver {

	public function insert() {
		return "INSERT INTO <<TABLE>>(<<COLUMN>>) VALUES(<<VALUE>>)";
	}//END METHOD

	public function update() {
		return "UPDATE <<TABLE>> <<SETTER>>";
	}//END METHOD

	public function delete() {
		return "DELETE FROM <<TABLE>>";
	}//END METHOD

	public function select() {
		return "SELECT <<ATTRIBUTE>> FROM <<TABLE>>";
	}//END METHOD

	public function where() {
		return "WHERE <<WHERE>>";
	}

	public function table() {
		return "<<TABLE>>";
	}//END METHOD

	public function order($by, $sort) {
		if(is_array($by)) {
			$orders = array();
			foreach($by as $key => $sort) {
				array_push($orders, $key." ".$sort);
			}//END FOR
			return ' ORDER BY '.implode(",", $orders);
		}else {
			if(strtoupper($sort)!=="ASC" AND strtoupper($sort)!=="DESC") {
				$sort = '';
			}
			return ' ORDER BY '.$by.' '.$sort;
		}//END IF
		
	}

	public function limit($start, $lim=NULL) {
		$sql = ' LIMIT '.$start.' ';
		if($lim!==NULL) {
			$sql .= ', '.$lim;
		}
		return $sql;
	}

	public function uppercase($key){
		return 'UPPER('.$key.')';
	}

}//END CLASS