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
    public function editPO($id){
        $type = new HospitalTypeModel();
        $data = array(
            'page_title' => 'Create Project',
            'page_description' => 'Login Page Description',
            "pagename" => 'projects',
            'PO' => $this->PurchaseModel->editPO($id),
            'types' => $type->getTypes(),
            'view_hospital_name' => $type->viewHospitalName($id)
        );
        $this->load->view('portal/edit-purchase-order', $data);
    }
    public function hospitalList()
    {
        $type_id = $this->input->post('type_id');
        $this->load->model('HospitalTypeModel');
        $hospital_names = $this->HospitalTypeModel->getNames($type_id);
        $data = [];
        $data['hospital_names'] = $hospital_names;
        $namesString = $this->load->view('portal/names-select', $data, true);
        $response['hospital_names'] = $namesString;
        echo json_encode($response);
    }
    public function addPO()
    {
        $PO_Date = $this->input->post('po_date');
        $delivery_period = $this->input->post('delivery_period');
        $delivery_period = $delivery_period . ' days';
        $supply_dueDate = date('d-m-Y', strtotime($PO_Date . $delivery_period));
        $data = [];
        $itemQty = $this->input->post('item_qty[]');        
        for($i = 0; $i < count($itemQty); $i++){
            $data1 = [
                'PO_Number'   => $this->input->post('po_number'),
                'File_Number'     => $this->input->post('file_number'),
                'PO_Date'     => $this->input->post('po_date'),
                'Year' => $this->input->post('year'),
                'Firm_Name' => $this->input->post('firm_name'),
                'Item_Name' => $this->input->post('item_name'),
                'Model' => $this->input->post('model'),
                'Unit_Rate' => $this->input->post('unit_rate'),
                'Item_Qty' => $this->input->post('item_qty')[$i],
                'Item_Amount' =>  $this->input->post('item_qty')[$i] * $this->input->post('unit_rate'),
                'District' => $this->input->post('district')[$i],
                'Hospital_Type' => $this->input->post('type')[$i],
                'Hospital_Name' => $this->input->post('hospital_name')[$i],
                'Delivery_Period' => $delivery_period,
                'Scheme' => $this->input->post('scheme'),
                'Supply_Status' => $this->input->post('supply_status'),
                'Supply_DueDate' => $supply_dueDate
            ];
            array_push($data, $data1);
        }
        $this->db->insert_batch('purchase_order', $data);

        // $data = [
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
        //     'Remarks' => $this->input->post('firm_name'),
        // ];
        // $pos->insertPO($data);
        $this->session->set_flashdata('status', 'New PO Added Successfully');
        redirect(base_url('portal/purchase-orders'));
    }
    public function viewPO($id)
    {
        $pos = new PurchaseModel();
        $hos = new HospitalTypeModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            'view_purchase_order' => $pos->viewPO($id),
            'view_hospital_name' => $hos->viewHospitalName($id)
        ];

        $this->load->view('portal/view-purchase-order', $data);
    }
    public function viewPODeials($id){
        $pos = new PurchaseModel();
        $hos = new HospitalTypeModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            'view_po' => $pos->PODetails($id),
            'view_hospital_name' => $hos->viewHospitalName($id)
        ];

        $this->load->view('portal/view-po', $data);
    }
}
