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
    public function editPO($id)
    {
        $type = new HospitalTypeModel();
        $data = array(
            'page_title' => 'Create Project',
            'page_description' => 'Login Page Description',
            "pagename" => 'projects',
            'PO' => $this->PurchaseModel->editPO($id),
            'types' => $type->getTypes(),
            'view_hospital_name' => $type->viewHospitalName($id),

        );
        $this->load->view('portal/edit-purchase-order', $data);
    }
    public function editPOItemDetails($id)
    {
        $type = new HospitalTypeModel();
        $data = array(
            'page_title' => 'Edit PO Item',
            'page_description' => 'Login Page Description',
            "pagename" => 'projects',
            'PO_Item' => $this->PurchaseModel->editPOItem($id),
            'types' => $type->getTypes(),
            'view_hospital_name' => $type->viewHospitalName($id),
            'hospital_name' => $type->HospitalNames($id),
        );
        $this->load->view('portal/edit-po-items', $data);
    }
    public function hospitalList()
    {
        $type_id = $this->input->post('type_id');
        $count = $this->input->post('count');
        $this->load->model('HospitalTypeModel');
        $hospital_names = $this->HospitalTypeModel->getNames($type_id);
        $data = [];
        $data['hospital_names'] = $hospital_names;
        $data['counter'] = $count;
        // print_r($data['hospital_names']['name']);die;
        //print_r($hospital_names);die;
        $namesString = $this->load->view('portal/names-select', $data, true);

        $response['hospital_names'] = $namesString;
        //print_r($response['hospital_names']);die;
        echo json_encode($response);
    }
    public function addPO()
    {
        //print_r($_POST);die;
        $po = new PurchaseModel();
        $PO_Date = $this->input->post('po_date');
        $PO_Date = date('d-m-Y', strtotime($PO_Date));
        $delivery_period = $this->input->post('delivery_period');
        $delivery_period = $delivery_period . ' days';
        $supply_dueDate = date('d-m-Y', strtotime($PO_Date . $delivery_period));
        $delivery_period1 = $this->input->post('delivery_period');
        $data = [
            'PO_Number'   => $this->input->post('po_number'),
            'File_Number'     => $this->input->post('file_number'),
            'PO_Date'     => $this->input->post('po_date'),
            'PO_Year' => $this->input->post('year'),
            'Firm_Name' => $this->input->post('firm_name'),
            'Gross_Amount' => $this->input->post('gross_amount'),
            'Delivery_Period' => $delivery_period1,
            'Scheme' => $this->input->post('scheme'),
            'Supply_DueDate' => $supply_dueDate
        ];
        $po_id = $po->insertpo($data);
        //$po_id = $this->input->post('po_number');
        //print_r($po->insertpo($data));die;
        $data1 = [];
        $itemQty = $this->input->post('item_qty[]');
        for ($i = 0; $i < count($itemQty); $i++) {
            //print_r($this->input->post('hospital_name_'.$i));die;
            $data2 = [
                'po_id' => $po_id,
                'Item_Name' => $this->input->post('item_name')[$i],
                'Item_Model' => $this->input->post('model')[$i],
                'Unit_Rate' => $this->input->post('unit_rate')[$i],
                'Item_Qty' => $this->input->post('item_qty')[$i],
                // 'Item_Amount' =>  $this->input->post('item_qty')[$i] * $this->input->post('unit_rate')[$i],
                //'District' => $this->input->post('district')[$i],
                //'Hospital_Type' => $this->input->post('type')[$i],
                //'Hospital_Name' => implode('_', $this->input->post('hospital_name_' . $i)),
                //'Supply_Status' => $this->input->post('supply_status'),

            ];
            $hospital_type = $this->input->post('type')[$i];
            $hospital_names = implode('_', $this->input->post('hospital_name_' . $i));
            $hospital_names = explode("_", $hospital_names);
            $District = $this->input->post('district')[$i];
            $supply_status = $this->input->post('supply_status');
            $data3 = [];
            for ($j = 0; $j < count($hospital_names); $j++) {
                //print_r($this->input->post('hospital_name_'.$i));die;
                $data4 = [
                    'item_po_id' => $po_id,
                    'Hospital_Type' => $hospital_type,
                    'po_hospital_name' => $hospital_names[$j],
                    'District' => $District,
                    'supply_status' => $supply_status

                ];
                array_push($data3, $data4);
            }
            $this->db->insert_batch('po_associate_hospitals', $data3);
            array_push($data1, $data2);
        }
        $this->db->insert_batch('po_item_details', $data1);

        //print_r(($hospital_names));die;

        // for ($i = 0; $i < count($hospital_names); $i++) {

        // }
        $this->session->set_flashdata('status', 'New PO Added Successfully');
        redirect(base_url('portal/purchase-orders'));
    }
    public function updatePO($id)
    {
        $pos = new PurchaseModel();
        $PO_Date = $this->input->post('po_date');
        $delivery_period = $this->input->post('delivery_period');
        $delivery_period = $delivery_period . ' days';
        $supply_dueDate = date('d-m-Y', strtotime($PO_Date . $delivery_period));
        $delivery_period1 = $this->input->post('delivery_period');
        $data = [];
        $data = [
            'PO_Number'   => $this->input->post('po_number'),
            'File_Number'     => $this->input->post('file_number'),
            'PO_Date'     => $this->input->post('po_date'),
            'PO_Year' => $this->input->post('year'),
            'Firm_Name' => $this->input->post('firm_name'),
            'Delivery_Period' => $delivery_period1,
            'Scheme' => $this->input->post('scheme'),
            'Supply_DueDate' => $supply_dueDate,
            'Is_DD' => $this->input->post('is_dd'),
            'DD_Number' => $this->input->post('dd_number'),
            'DD_Date' => $this->input->post('dd_date'),
            'DD_Amount' => $this->input->post('dd_amt'),
            'DD_Validity' => $this->input->post('dd_validity'),
            'Is_Agreement' => $this->input->post('is_agreement'),
            'Agreement_No' => $this->input->post('agreement_no'),
            'Agreement_Date' => $this->input->post('agreement_date'),
            'Is_BillsSubmit' => $this->input->post('is_bills_submit'),
            'Bills_Percentage' => $this->input->post('bills_to_be_submit'),
            'Payment_Received' => $this->input->post('received_amt'),
            //'Balance_Amount' => $this->input->post('firm_name'),
            'Remarks' => $this->input->post('remarks'),
        ];
        $pos->updatePO($data, $id);
        //$this->db->insert_batch('purchase_order', $data);

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
    public function updatePOItem($id)
    {
        $pos = new PurchaseModel();
        $data = [
            // 'Item_Name' => $this->input->post('item_name'),
            // 'Item_Model' => $this->input->post('model'),
            // 'Unit_Rate' => $this->input->post('unit_rate'),
            // 'Item_Qty' => $this->input->post('item_qty'),
            // 'Item_Amount' =>  $this->input->post('item_qty') * $this->input->post('unit_rate'),
            // 'District' => $this->input->post('district'),
            // 'Hospital_Type' => $this->input->post('type'),
            // 'Hospital_Name' => $this->input->post('hospital_name'),
            'supply_status' => $this->input->post('supply_status'),
            'Delivery_Date' => $this->input->post('delivery_date'),
            'Warranty_Years' => $this->input->post('warranty_years'),
            'Installation_Date' => $this->input->post('installation_date'),
        ];
        $pos->updatePOItem($data, $id);
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
            'view_hospital_name' => $hos->viewHospitalName($id),
        ];

        $this->load->view('portal/view-purchase-order', $data);
    }
    public function viewPODetails($id)
    {
        $pos = new PurchaseModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            'view_po' => $pos->PODetails($id),

            'PO' => $pos->viewPO($id),
        ];

        $this->load->view('portal/view-po', $data);
    }
    public function viewPOItemDetails($id)
    {
        $pos = new PurchaseModel();
        $hos = new HospitalTypeModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            // 'view_po_items' => $pos->PODetails($id),
            // 'hospital_name' => $hos->HospitalName($id),
            'hospital_names' => $hos->HospitalNames($id),
        ];
        $this->load->view('portal/view-po-items', $data);
    }
}
