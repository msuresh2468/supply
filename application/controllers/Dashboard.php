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
        $this->load->model('PurchaseModel');
    }
	public function index()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Dashboard',
            "pagename" => 'index',
            'total' => $pos->totalAmount()
            // 'outstanding' => $pos->Outstanding()
        ];
        $this->load->view('portal/index', $data);
	}
    public function purchase()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Purchase Orders',
            "pagename" => 'purchase',
            'purchase_orders' => $pos-> allPOs()
        ];
        $this->load->view('portal/purchase-orders', $data);
	}
    public function supplied()
	{
		$data = [
            'page_title' => 'Supplied Items',
            "pagename" => 'supplied'
        ];
        $this->load->view('portal/supplied-items', $data);
	}
    public function notsupplied()
	{
		$data = [
            'page_title' => 'Not Supplied Items',
            "pagename" => 'notsupplied'
        ];
        $this->load->view('portal/not-supplied-items', $data);
	}
    public function installed()
	{
		$data = [
            'page_title' => 'Installed Items',
            "pagename" => 'installed'
        ];
        $this->load->view('portal/installed-items', $data);
	}
    public function notinstalled()
	{
		$data = [
            'page_title' => 'Not Installed Items',
            "pagename" => 'notinstalled'
        ];
        $this->load->view('portal/not-installed-items', $data);
	}
    public function afterCutoff()
	{
		$data = [
            'page_title' => 'Installed Items After Cutoff Date',
            "pagename" => 'installafter',
        ];
        $this->load->view('portal/installed-items-after-cutoff-date', $data);
	}
    public function beforeCutoff()
	{
		$data = [
            'page_title' => 'Installed Items Before Cutoff Date',
            "pagename" => 'installbefore'
        ];
        $this->load->view('portal/installed-items-before-cutoff-date', $data);
	}
    public function status()
	{
		$data = [
            'page_title' => 'Supply Status',
            "pagename" => 'status'
        ];
        $this->load->view('portal/supply-status', $data);
	}
    public function addPO()
	{
		$data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase'
        ];
        $this->load->view('portal/add-purchase-order', $data);
	}
}
