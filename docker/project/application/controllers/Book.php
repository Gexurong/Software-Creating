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
    
    public function info()
	{
		$this->load->view('detail');
    }
    
    public function read()
    {
        $this->load->view('read');
    }
}