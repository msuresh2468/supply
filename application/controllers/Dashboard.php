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
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/index', $data);
	}
    public function purchase()
	{
		$data = [
            'page_title' => 'Purchase Orders',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/purchase-orders', $data);
	}
    public function supplied()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/supplied-items', $data);
	}
    public function notsupplied()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/not-supplied-items', $data);
	}
    public function installed()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/installed-items', $data);
	}
    public function notinstalled()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/not-installed-items', $data);
	}
    public function afterCutoff()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
        ];
        $this->load->view('portal/installed-items-after-cutoff-date', $data);
	}
    public function beforeCutoff()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/installed-items-before-cutoff-date', $data);
	}
    public function status()
	{
		$data = [
            'page_title' => 'Dashboard',
            'page_description' => 'Home Page Description',
            "pagename" => 'index',
            "calendar" => $this->calendar->generate()
        ];
        $this->load->view('portal/supply-status', $data);
	}
}
