<?php
class {{table_name_ucfirst}}_model extends CI_Model {
    
    public $table = '{{table_name}}';

    /*
    |----------------------------------------------
    | how to use : $Params['key']
    | ArCustomer = $Params['ArCustomer']
    | true : 1=1
    */
    private function __generateWhere($Params) {
        if(count($Params)>0) {
            return[
                "update"        => " {{first_column}}='".$Params['{{first_column}}']."'",
                "delete"        => " {{first_column}}='".$Params['{{first_column}}']."'",
                "getAll"        => " 1=1 ",
                "getSelected"   => " {{first_column}}='".$Params['{{first_column}}']."'",
            ];
        }else {
            return[
                "update"        => " 1=1 ",
                "delete"        => " 1=1 ",
                "getAll"        => " 1=1 ",
                "getSelected"   => " 1=1 ",
            ];
        }
    }

    /*
    |----------------------------------------------
    | ignore __mode
    | digunakan untuk melewati beberapa field yang dideklarasi, 
    | sehingga field tidak terambil, contohnya TimeStamp
    */
    private function __ignoreSelect() {
        return [
            'TimeStamp'
        ];
    }

    private function __ignoreUpdate() {
        return [
            'TimeStamp' 
        ];
    }

    /*
    |----------------------------------------------
    | automatic mapping
    |
    */
    private function __generateParams($Params, $ignore=[]) {
        $Schema = $this->__SCHEMA();
        $Values = [];
        for($i=0, $m=count($Schema); $i<$m; $i++) {
            if(!in_array($Schema[$i], $ignore)) {
                $Values[] = $Params[$Schema[$i]];
            }
        }
        return $Values;
    }

    /*
    |----------------------------------------------
    | automatic generate columns are used by select method
    | combine to ignore columns case
    */
    private function __colums() {
        $Schema  = $this->__SCHEMA();
        $Ignore  = $this->__ignoreSelect();
        $Columns = [];
        for($i=0, $m=count($Schema); $i<$m; $i++) {
            if(!in_array($Schema[$i], $Ignore)) {
                $Columns[] = $Schema[$i];
            }
        }
        return $Columns;
    }

    private function __SCHEMA() {
    	return [{{table_column}}];
    } //

    /*
    |-------------------------------------------------------------------------------------
    | Insert
    |-------------------------------------------------------------------------------------
    | 
    */
	public function insert($Params = array()){
		$Qry	= "INSERT INTO $this->table (
						{{table_column_insert}}
					)
					VALUES (
						{{table_value_insert}}
					)";
		$Exe  = $this->db->query($Qry, $this->__generateParams($Params));
		
		return $Exe;
	}

	/*
    |-------------------------------------------------------------------------------------
    | Update
    |-------------------------------------------------------------------------------------
    | 
    */
	public function update($Params = array()){
		$Qry	=  "UPDATE $this->table SET 
						{{table_column_update}} 
					WHERE ".$this->__generateWhere($Params)['update'];
		$Exe  = $this->db->query($Qry, $this->__generateParams($Params, $this->__ignoreUpdate()));
		
		return $Exe;
	}
	
	/*
    |-------------------------------------------------------------------------------------
    | Delete
    |-------------------------------------------------------------------------------------
    | 
    */
    public function delete($Params = array()){
        $Qry    = "DELETE $this->table WHERE ".$this->__generateWhere($Params)['delete'];
        $Exe    = $this->db->query($Qry);
        
        return $Exe;
    }
    
    /*
    |-------------------------------------------------------------------------------------
    | getAll
    |-------------------------------------------------------------------------------------
    | 
    */
    public function getAll($Params = array()){
        $Columns = implode(",", $this->__colums());
        $Qry     = "SELECT $Columns FROM $this->table WHERE ".$this->__generateWhere($Params)['getAll'];
        $Exe     = $this->db->query($Qry);
        
        if($Exe->num_rows() > 0){           
            $Result = $Exe->result_array();
            $Exe->free_result();
            
            return $Result;         
        }else{      
            return false;           
        }       
    }
    
    /*
    |-------------------------------------------------------------------------------------
    | getSelected
    |-------------------------------------------------------------------------------------
    | 
    */
    public function getSelected($Params = array()){
        $Columns = implode(",", $this->__colums());
        $Qry     = "SELECT $Columns FROM $this->table WHERE ".$this->__generateWhere($Params)['getSelected'];
        $Exe     = $this->db->query($Qry);
        
        if($Exe->num_rows() > 0){           
            $Result = $Exe->result_array();
            $Exe->free_result();
            
            return $Result[0];          
        }else{      
            return false;           
        }
    }
	
} // end class model