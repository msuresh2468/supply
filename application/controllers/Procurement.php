<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Procurement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Authentication');
        $this->load->model('UserModel');
        $this->load->model('ProcumentModel');
    }
    public function createProcurement()
    {
        $procurement = new ProcumentModel();
        $data = [
            'page_title' => 'Add Procuement Item',
            "pagename" => 'tender',
            'procurement' => $procurement->allprocurements()
        ];

        $this->load->view('portal/procurement/add-procurement-item', $data);
    }
    public function addProcurement()
    {
        $procurement = new ProcumentModel();
        $year = $this->input->post('year');
        $Item_Name = $this->input->post('item_name');
        $Item_Model = $this->input->post('model');
        $Offer_Price = $this->input->post('offer_price');
        $Tender_No = $this->input->post('tender_no');
        $Quote_Price = $this->input->post('quote_price');
        $data = [
            'Year' => $year,
            'Item_Name' => $Item_Name,
            "Item_Model" => $Item_Model,
            "Offer_Price" => $Offer_Price,
            "Tender_No" => $Tender_No,
            "Quote_Price" => $Quote_Price,
        ];
        $procurement->insertprocurement($data);

        $this->session->set_flashdata('status', 'New Procurement Item Details Added Successfully');
        redirect(base_url('portal/procurement-details'));
    }
    
}
