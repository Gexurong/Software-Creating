<?php
class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->helper('url_helper');
    }

	public function list()
	{
		$this->load->view('list');
    }
    
    public function info($id)
	{
        $data['book'] = $this->book_model->get_book_info($id);
        $this->load->view('detail', $data);
    }
    
    public function read($id, $chapterid)
    {
        $data['page'] = $this->book_model->get_page($id, $chapterid);
        $this->load->view('read');
    }
}