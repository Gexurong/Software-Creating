<?php
class News_model extends CI_Model {

    public function __construct()
    {
        //$this->load->database();还没配数据库
    }
    /*
    public function get_book($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('book');
            return $query->result_array();
        }

        $query = $this->db->get_where('book', array('slug' => $slug));
        return $query->row_array();
    }
    */
}
