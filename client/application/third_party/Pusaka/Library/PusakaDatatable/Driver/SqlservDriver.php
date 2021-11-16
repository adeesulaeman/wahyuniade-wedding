<?php
class SqlsrvDriver {

	public static function insert() {
		return "INSERT INTO <<TABLE>>(<<COLUMN>>) VALUES(<<VALUE>>)";
	}//END METHOD

	public static function update() {
		return "UPDATE <<TABLE>> <<SETTER>>";
	}//END METHOD

	public static function delete() {
		return "DELETE FROM <<TABLE>>";
	}//END METHOD

	public static function select() {
		return "SELECT <<ATTRIBUTE>> FROM <<TABLE>>";
	}//END METHOD

	public static function where() {
		return "WHERE <<WHERE>>";
	}

	public static function table() {
		return "<<TABLE>>";
	}//END METHOD

	public static function order($by, $sort) {
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

	public static function limit($start, $lim=NULL) {
		$sql = ' OFFSET '.$start.' ROWS';
		if($lim!==NULL) {
			$sql .= ' FETCH NEXT '.$lim.' ROWS ONLY';
		}
		return $sql;
	}

	public static function uppercase($key){
		return 'UPPER('.$key.')';
	}

}//END CLASS
?>