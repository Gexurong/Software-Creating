<?php
class Book_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_book($name = FALSE)
    {
        $sql = "SELECT * FROM comic";
        $query = $this->db->query($sql);
        return $query->row_array();
        
        #return $this->db->_error_message();
        #return "ok1";
    }
    
}
