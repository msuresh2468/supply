<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data = [
            'page_title' => 'Login',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
        ];
        $this->load->view('home', $data);
	}
}
