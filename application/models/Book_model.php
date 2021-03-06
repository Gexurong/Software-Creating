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
        return $query->result_array();
        
        #return $this->db->_error_message();
        #return "ok1";
    }

    public function get_book_info($id)
    {
        if ($id == null) {

        }
        else {
            $sql = "SELECT * FROM comic WHERE id = $id";
            $query = $this->db->query($sql);
            return $query->row_array();
        }
    }

    public function get_page($id, $chapterid) {
        $sql = "SELECT page FROM chapter WHERE comicid = $id AND chapterid = $chapterid";
        $query = $this->db->query($sql);
        return $query->row()->page;
    }

    public function get_comment($id) {
        $sql = "SELECT * FROM comment WHERE comicid = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function post_comment($bookid, $nickname, $comment, $avator) {
        $data = array(
            'comicid' => $bookid,
            'name' => $nickname,
            'content' => $comment,
            'avator' => $avator,
            'time' => date("Y-m-d h:i:sa"),
        );
        $this->db->insert('comment', $data);
        return;
    }

    
    
}
