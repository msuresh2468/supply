<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_Orders extends CI_Controller
{
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
        $this->load->model('HospitalTypeModel');
    }
    public function createPO()
    {
        $type = new HospitalTypeModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            'types' => $type->getTypes(),
        ];

        $this->load->view('portal/add-purchase-order', $data);
    }
    public function hospitalList()
    {
        $type_id = $this->input->post('type_id');
        $this->load->model('HospitalTypeModel');
        $hospital_names = $this->HospitalTypeModel->getNames($type_id);
        //print_r($hospital_names);
        $data = [];
        $data['hospital_names'] = $hospital_names;
        $namesString = $this->load->view('portal/names-select', $data, true);
        $response['hospital_names'] = $namesString;
        echo json_encode($response);
    }
    public function addPO()
    {
        $pos = new PurchaseModel();
        $PO_Date = $this->input->post('po_date');
        $gross = $this->input->post('gross_amount');
        $firm_name = $this->input->post('firm_name');
        $item_name = $this->input->post('item_name');
        $model = $this->input->post('model');
        $itemQty = $this->input->post('item_qty');
        $unit = $this->input->post('unit_rate');

        $hospital_type = $this->input->post('type[]');
        $district = $this->input->post('district[]');
        $hospital_name = $this->input->post('hospital_name[]');

        $delivery_period = $this->input->post('delivery_period[]');
        // $delivery_period = $delivery_period . ' days';
        // $supply_dueDate = date('d-m-Y', strtotime($PO_Date . $delivery_period));
        $scheme = $this->input->post('scheme');
        $status = $this->input->post('status');
        $data = array();
        foreach ($itemQty as $key => $value) {
            $data = [
                'PO_Number'     => $this->input->post('po_number'),
                'File_Number'     => $this->input->post('file_number'),
                'PO_Date'     => $this->input->post('po_date'),
                'Firm_Name' => $this->input->post('firm_name'),
                'Item_Name' => $this->input->post('item_name'),
                'Model' => $this->input->post('model'),
                'Unit_Rate' => $this->input->post('unit_rate'),
                'Item_Qty' => $value,
                // 'Hospital_Type' => $hospital_type[$key],
                // 'District' => $district[$key],
                // 'Hospital_Name' => $hospital_name[$key],
                // 'Delivery_Period' => $delivery_period[$key],
                // 'Scheme' => $scheme[$key],
                
                // 'Supply_DueDate' => $supply_dueDate,
                // 'Year' => $this->input->post('year'),
                // 'Supply_Status' => $this->input->post('supply_status'),
                // 'Gross_Amount' => $this->input->post('gross_amount')
                ];
        }
        $pos->insertPO($data);
        // $this->db->insert_batch('purchase_order', $data);
        // $itemQty = $this->input->post('item_qty');
        // $unit = $this->input->post('unit_rate');
        // $itemAmt = ($itemQty * $unit);
        // $delivery_period = $this->input->post('delivery_period');
        // $delivery_period = $delivery_period . ' days';
        // $PO_Date = $this->input->post('po_date');
        // $Is_DD = $this->input->post('is_dd') || '';
        // $supply_dueDate = date('d-m-Y', strtotime($PO_Date . $delivery_period));


        // $data = [
        //     'PO_Number'     => $this->input->post('po_number'),
        //     'File_Number'     => $this->input->post('file_number'),
        //     'PO_Date'     => $this->input->post('po_date'),
        //     'Firm_Name' => $this->input->post('firm_name'),
        //     'Item_Name' => $this->input->post('item_name'),
        //     'Model' => $this->input->post('model'),
        //     'Item_Qty' => $this->input->post('item_qty'),
        //     'Unit_Rate' => $this->input->post('unit_rate'),
        //     'Item_Amount' => $itemAmt,
        //     'Hospital_Name' => $this->input->post('hospital_name'),
        //     'Delivery_Period' => $this->input->post('delivery_period'),
        //     'Scheme' => $this->input->post('scheme'),
        //     'Supply_DueDate' => $supply_dueDate,
        //     'Is_DD' => $Is_DD,
        //     'DD_Number' => $this->input->post('dd_number'),
        //     'DD_Date' => $this->input->post('dd_date'),
        //     'DD_Amount' => $this->input->post('dd_amt'),
        //     'Is_Agreement' => $this->input->post('firm_name'),
        //     'Agreement_No' => $this->input->post('firm_name'),
        //     'Agreement_Date' => $this->input->post('firm_name'),
        //     'Supply_Status' => $this->input->post('firm_name'),
        //     'Delivery_Date' => $this->input->post('firm_name'),
        //     'Installation_Date' => $this->input->post('firm_name'),
        //     'Is_BillsSubmit' => $this->input->post('firm_name'),
        //     'Bills_Percentage' => $this->input->post('firm_name'),
        //     'Payement_Received' => $this->input->post('firm_name'),
        //     'Balance_Amount' => $this->input->post('firm_name'),
        //     'Year' => $this->input->post('firm_name'),
        //     'Remarks' => $this->input->post('firm_name'),
        // ];
        // $pos->insertPO($data);
        // foreach($field_values_array as $data){
        //     $pos->insertRecord($data);
        // }
        //$pos->insertRecord($data);
        $this->session->set_flashdata('status', 'New PO Added Successfully');
        redirect(base_url('portal/purchase-orders'));
    }
}