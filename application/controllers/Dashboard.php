<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('calendar');
        $this->load->library('session');
        $this->load->model('Authentication');
        $this->load->model('UserModel');

    }
	public function index()
	{
		$data = [
            'page_title' => 'Login',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/index', $data);
	}
}
