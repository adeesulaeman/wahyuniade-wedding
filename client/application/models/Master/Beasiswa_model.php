<?php
class Beasiswa_model extends Pusaka_Model {

   public $table = 'tbl_status_beasiswa';

   /*
   * __SCHEMA
   **/
   public function __SCHEMA() {
       return [
      ];
   }

   public function ignoreSelected() {
      return ['TimeStamp'];
   }
   /*
   * @params ( array $data )
   **/
   public function where($mode) {
      switch($mode) {
         case 'update'        :
            $this->db->where('Division', $this->post('Division'));
            /*--------------*/
            break;
         case 'delete'        :
            $this->db->where('Division', $this->post('Division'));
            /*--------------*/
            break;
         case 'getSelected'   :
            $this->db->where('IdBeasiswa', $this->post('IdBeasiswa'));
            /*--------------*/
            break;
         case 'getAll'        :
            $this->db->where('Status', 'ACTIVE');
            /*--------------*/
            break;
      }
   }// end method

   /*
   * @params ( array $data )
   **/
   public function getSelected($data) {
      $this->__set_post($data);
      $this->where('getSelected');
      $query = $this->db->get($this->table);
      
      // Untuk Type Query
      if(!($query->num_rows() > 0)) {
         $this->__set_response(
             // Header
             array(
                 'STATUS'    => 200,
                 'MESSAGE'   => 'Error In Model',
                 'E_NO'      => $this->error()['code'],
                 'E_MESSAGE' => $this->error()['message']
             ),
             // Data
             NULL
             // Ignore
             // First
         );
      }else {
         $this->__set_response(
             // Header
             array(
                 'STATUS'    => 100,
                 'MESSAGE'   => 'Success',
                 'E_NO'      => $this->error()['code'],
                 'E_MESSAGE' => $this->error()['message']
             ),
             // Data
             $query->result_array(),
             // Ignore
             $this->ignoreSelected(),
             // First
             True
         );
      }
      return $this->response();
   }// end method

    /*
    |-------------------------------------------------------------------------------------
    | Transaction
    |-------------------------------------------------------------------------------------
    |
    */
   public function updateuser($Params = array()) {

        $tableName = "Users";

        $this->db->trans_begin();
        $data = $Params;

        if(count($Params) <= 0)
            die();

        $this->db->set('Status', 'NON ACTIVE');
        $this->db->where('Division', $data['Division']);
        $this->db->update($tableName);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
   }

   public function updateuser2($Params = array()) {

        $tableName = "Users";

        $this->db->trans_begin();
        $data = $Params;

        if(count($Params) <= 0)
            die();

        $this->db->set('Status', 'ACTIVE');
        $this->db->where('Division', $data['Division']);
        $this->db->update($tableName);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
   }

} // end class model
