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
            'total' => $pos->totalAmount(),
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
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Supplied Items',
            "pagename" => 'supplied',
            'supplied' => $pos->supplied()
        ];
        $this->load->view('portal/supplied-items', $data);
	}
    public function notsupplied()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Not Supplied Items',
            "pagename" => 'notsupplied',
            'notsupplied' => $pos->notsupplied()
        ];
        $this->load->view('portal/not-supplied-items', $data);
	}
    public function installed()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Installed Items',
            "pagename" => 'installed',
            'installed' => $pos->installed()
        ];
        $this->load->view('portal/installed-items', $data);
	}
    public function notinstalled()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Not Installed Items',
            "pagename" => 'notinstalled',
            'notinstalled' => $pos->notinstalled() 
        ];
        $this->load->view('portal/not-installed-items', $data);
	}
    public function afterCutoff()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Installed Items After Cutoff Date',
            "pagename" => 'installafter',
            'afterCutoffinstalled' => $pos->afterCutoffinstalled() 
        ];
        $this->load->view('portal/installed-items-after-cutoff-date', $data);
	}
    public function beforeCutoff()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Installed Items Before Cutoff Date',
            "pagename" => 'installbefore',
            'beforeCutoffinstalled' => $pos->beforeCutoffinstalled() 
        ];
        $this->load->view('portal/installed-items-before-cutoff-date', $data);
	}
    public function paymentDetails()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'PO Payment Details',
            "pagename" => 'status',
            'status' => $pos-> status()
        ];
        $this->load->view('portal/payment-details', $data);
	}
    public function agreements()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'PO Agreements',
            "pagename" => 'status',
            'status' => $pos-> status()
        ];
        $this->load->view('portal/po-agreements', $data);
	}
    public function dd()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'PO DD',
            "pagename" => 'status',
            'status' => $pos-> status()
        ];
        $this->load->view('portal/po-dds-list', $data);
	}
    public function warranty()
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'Item Warranty',
            "pagename" => 'status',
            'status' => $pos-> status()
        ];
        $this->load->view('portal/po-item-warranty', $data);
	}
}
