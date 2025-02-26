<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_Orders extends CI_Controller {
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
    public function createPO()
	{
		$data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase'
        ];
        $this->load->view('portal/add-purchase-order', $data);
	}
    public function viewPO($id)
	{
        $pos = new PurchaseModel();
		$data = [
            'page_title' => 'View Purchase Order',
            "pagename" => 'add-purchase',
            'view_purchase_order' => $pos-> viewPO($id)
        ];
        $this->load->view('portal/view-purchase-order', $data);
	}
    public function addPO()
	{
        $pos = new PurchaseModel();
        $itemQty = $this->input->post('item_qty');
        $unit = $this->input->post('unit_rate');
        $itemAmt = ($itemQty * $unit);
        $data = [
            'PO_Number'     => $this->input->post('po_number'),
            'File_Number'     => $this->input->post('file_number'),
            'PO_Date'     => $this->input->post('po_date'),
            'Firm_Name' => $this->input->post('firm_name'),
            'Item_Name' => $this->input->post('item_name'),
            'Model' => $this->input->post('model'),
            'Item_Qty' => $this->input->post('item_qty'),
            'Unit_Rate' => $this->input->post('unit_rate'),
            'Item_Amount' => $itemAmt,
            'Hospital_Name' => $this->input->post('hospital_name'),
            'Delivery_Period' => $this->input->post('delivery_period'),
            'Scheme' => $this->input->post('scheme'),
            'Supply_DueDate'=> $this->input->post('supply_due_date'),
            'Is_DD'=> $this->input->post('is_dd'),
            'DD_Number'=> $this->input->post('dd_number'),
            'DD_Date'=> $this->input->post('dd_date'),
            'DD_Amount'=> $this->input->post('dd_amt'),
            // 'Is_Agreement'=> $this->input->post('firm_name'),
            // 'Agreement_No'=> $this->input->post('firm_name'),
            // 'Agreement_Date'=> $this->input->post('firm_name'),
            // 'Supply_Status'=> $this->input->post('firm_name'),
            // 'Delivery_Date'=> $this->input->post('firm_name'),
            // 'Installation_Date'=> $this->input->post('firm_name'),
            // 'Is_BillsSubmit'=> $this->input->post('firm_name'),
            // 'Bills_Percentage'=> $this->input->post('firm_name'),
            // 'Payement_Received'=> $this->input->post('firm_name'),
            // 'Balance_Amount'=> $this->input->post('firm_name'),
            // 'Year'=> $this->input->post('firm_name'),
            // 'Remarks'=> $this->input->post('firm_name'),
        ];
        $pos->insertPO($data);
        $this->session->set_flashdata('status', 'New PO Added Successfully');
        redirect(base_url('portal/purchase-orders'));
	}
}
