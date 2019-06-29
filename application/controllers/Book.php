<?php
class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->helper('url_helper');
    }

	
    
	public function index()
	{

		$data['books'] = $this->book_model->get_book();
		$this->load->view('index', $data);
    }
    
    public function info($id)
	{
        $data['book'] = $this->book_model->get_book_info($id);
        $data['comment'] = $this->book_model->get_comment($id);
        $this->load->view('detail', $data);
    }
    
    public function read($id, $chapterid)
    {
        $data['page'] = $this->book_model->get_page($id, $chapterid);
        $data['id'] = $id;
        $data['chapterid'] = $chapterid;
        if ($this->book_model->get_book_info($id)['chapter'] == $chapterid) {
            $data['last'] = 1;
        }
        else $data['last'] = 0;
        
        $this->load->view('read', $data);
    }

    public function post_comment($bookid){
        $name = $this->input->get_post('nickname');
        $comment = $this->input->get_post('comment');
        $avator = $this->input->get_post('avator');
        $this->book_model->post_comment($bookid, $name, $comment, $avator);

        return 0;
    }
}