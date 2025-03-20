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
            //'view_hospital_name' => $type->viewHospitalName($id),
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
        $namesString = $this->load->view('portal/names-select', $data, true);

        $response['hospital_names'] = $namesString;
        echo json_encode($response);
    }
    public function addPO()
    {
        
        $po = new PurchaseModel();
        $PO_Date = $this->input->post('po_date');
        $PO_Date = date('Y-m-d', strtotime($PO_Date));
        $delivery_period = $this->input->post('delivery_period');
        $delivery_period = $delivery_period . ' days';
        $supply_dueDate = date('Y-m-d', strtotime($PO_Date . $delivery_period));
        $delivery_period1 = $this->input->post('delivery_period');
        $itemQty = $this->input->post('item_qty[]');
        $gross_amt = $this->input->post('gross_amount');
        $gross_amt = round($gross_amt);
        $hosp_gross = 0;
        $unit = $this->input->post('unit_rate');
        for ($a = 0; $a < count($itemQty); $a++) {
            $unit = $this->input->post('unit_rate')[$a];
            $qty = $this->input->post('item_qty')[$a];
            //print_r($this->input->post('hospital_name_' . $a));
            if ($this->input->post('hospital_name_' . $a) != NULL) {
                $hospital_names = implode('_', $this->input->post('hospital_name_' . $a));
                $hospital_names = explode("_", $hospital_names);
                $hosp_gross = round($hosp_gross + ($unit * $qty * count($hospital_names)));
            }
        }
        if ($gross_amt == $hosp_gross) {
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
            //$data1 = [];
            for ($i = 0; $i < count($itemQty); $i++) {
                if ($this->input->post('hospital_name_' . $i) != NULL) {
                    $data2 = [
                        'po_id' => $po_id,
                        'Item_Name' => $this->input->post('item_name')[$i],
                        'Item_Model' => $this->input->post('model')[$i],
                        'Unit_Rate' => $this->input->post('unit_rate')[$i],
                        'Item_Qty' => $this->input->post('item_qty')[$i],
                    ];
                    $item_id = $po->insertpoitem($data2);
                    $hospital_type = $this->input->post('type')[$i];
                    $hospital_names = implode('_', $this->input->post('hospital_name_' . $i));
                    $hospital_names = explode("_", $hospital_names);
                    $District = $this->input->post('district')[$i];
                    $supply_status = $this->input->post('supply_status');
                    $data3 = [];
                    for ($j = 0; $j < count($hospital_names); $j++) {
                        $data4 = [
                            'item_id' => $item_id,
                            'Hospital_Type' => $hospital_type,
                            'po_hospital_name' => $hospital_names[$j],
                            'District' => $District,
                            'supply_status' => $supply_status

                        ];
                        array_push($data3, $data4);
                    }


                    $this->db->insert_batch('po_associate_hospitals', $data3);
                    //array_push($data1, $data2);
                }
            }
            //$this->db->insert_batch('po_item_details', $data1);
            $this->session->set_flashdata('status', 'New PO Added Successfully');
            redirect(base_url('portal/purchase-orders'));
        } else {
            $this->session->set_flashdata('status', 'Items Amount must be equal to the Gross Amount');
           // $this->session->set_flashdata('old_input', $this->input->post());
           // print_r($this->input->post());die;
            redirect(base_url('portal/add-purchase-order'));
            
        }
    }
    public function updatePO($id)
    {

        $pos = new PurchaseModel();
        $PO_Date = $this->input->post('po_date');
        $delivery_period = $this->input->post('delivery_period');
        $delivery_period = $delivery_period . ' days';
        $supply_dueDate = date('Y-m-d', strtotime($PO_Date . $delivery_period));
        $delivery_period1 = $this->input->post('delivery_period');
        $gross_amt = $this->input->post('gross_amt');
        $bill_60 = $this->input->post('bill_60_received_amt');
        $bill_30 = $this->input->post('bill_30_received_amt');
        $bill_90 = $this->input->post('bill_90_received_amt');
        $bill_10 = $this->input->post('bill_10_received_amt');
        $pay_60 = $this->input->post('payment_60_received_amt');
        $pay_30 = $this->input->post('payment_30_received_amt');
        $pay_90 = $this->input->post('payment_90_received_amt');
        $pay_10 = $this->input->post('payment_10_received_amt');
        $pay_amt = $pay_10 + $pay_90 + $pay_30 + $pay_60;
        $bills_amt = $bill_60 + $bill_30 + $bill_10 + $bill_90;

        if ($gross_amt < $bills_amt) {
            $this->session->set_flashdata('status', 'Bills Amount is Higher than the Gross Amount');
            redirect(base_url('portal/view-po/' . $id));
        } else if ($gross_amt < $pay_amt) {
            $this->session->set_flashdata('status', 'Payment Amount is Higher than the Gross Amount');
            redirect(base_url('portal/view-po/' . $id));
        } else {

            $data = [];
            $data = [
                'PO_Number'   => $this->input->post('po_number'),
                'File_Number'     => $this->input->post('file_number'),
                'PO_Date'     => $this->input->post('po_date'),
                'PO_Year' => $this->input->post('year'),
                'Gross_Amount' => $this->input->post('gross_amt'),
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
                'Bills_Percentage_60' => $this->input->post('bill_60'),
                'Bills_60_Amount' => $this->input->post('bill_60_received_amt'),
                'Bills_60_Date' => $this->input->post('bill_60_received_date'),
                'Bills_Percentage_30' => $this->input->post('bill_30'),
                'Bills_30_Amount' => $this->input->post('bill_30_received_amt'),
                'Bills_30_Date' => $this->input->post('bill_30_received_date'),
                'Bills_Percentage_90' => $this->input->post('bill_90'),
                'Bills_90_Amount' => $this->input->post('bill_90_received_amt'),
                'Bills_90_Date' => $this->input->post('bill_90_received_date'),
                'Bills_Percentage_10' => $this->input->post('bill_10'),
                'Bills_10_Amount' => $this->input->post('bill_10_received_amt'),
                'Bills_10_Date' => $this->input->post('bill_10_received_date'),
                'Is_Payment' => $this->input->post('is_payment'),
                'Pay_Percentage_60' => $this->input->post('payment_60'),
                'Pay_60_Amt' => $this->input->post('payment_60_received_amt'),
                'Pay_60_Date' => $this->input->post('payment_60_received_date'),
                'Pay_Percentage_30' => $this->input->post('payment_30'),
                'Pay_30_Amt' => $this->input->post('payment_30_received_amt'),
                'Pay_30_Date' => $this->input->post('payment_30_received_date'),
                'Pay_Percentage_90' => $this->input->post('payment_90'),
                'Pay_90_Amt' => $this->input->post('payment_90_received_amt'),
                'Pay_90_Date' => $this->input->post('payment_90_received_date'),
                'Pay_Percentage_10' => $this->input->post('payment_10'),
                'Pay_10_Amt' => $this->input->post('payment_10_received_amt'),
                'Pay_10_Date' => $this->input->post('payment_10_received_date'),
                'LDC_Amount1' => $this->input->post('ldc_amount_1'),
                'LDC_Amount2' => $this->input->post('ldc_amount_2'),
                'LDC_Amount3' => $this->input->post('ldc_amount_3'),
                'Deductions_1' => $this->input->post('deductions_1'),
                'Deductions_2' => $this->input->post('deductions_3'),
                'Deductions_3' => $this->input->post('deductions_3'),
                'Payment_Received' => $this->input->post('received_amt'),
                //'Balance_Amount' => $this->input->post('firm_name'),
                'Remarks' => $this->input->post('remarks'),
            ];
            $pos->updatePO($data, $id);
            $this->session->set_flashdata('status', 'New PO Added Successfully');
            redirect(base_url('portal/purchase-orders'));
        }
    }
    public function updatePOItem($id)
    {
        $pos = new PurchaseModel();
        $installation_date = $this->input->post('installation_date');
        //$installation_date = date('Y-m-d', strtotime($installation_date));
        $data = [
            // 'Item_Name' => $this->input->post('item_name'),
            // 'Item_Model' => $this->input->post('model'),
            // 'Unit_Rate' => $this->input->post('unit_rate'),
            // 'Item_Qty' => $this->input->post('item_qty'),
            //'Item_Amount' =>  $this->input->post('item_qty') * $this->input->post('unit_rate'),
            // 'District' => $this->input->post('district'),
            // 'Hospital_Type' => $this->input->post('type'),
            // 'po_hospital_name' => $this->input->post('hospital_name'),
            'supply_status' => $this->input->post('supply_status'),
            'Delivery_Date' => $this->input->post('delivery_date'),
            'Warranty_Years' => $this->input->post('warranty_years'),
            'Warranty_Date' => $this->input->post('warranty_date'),
            'Stock_Entry_Page_Number' => $this->input->post('stock_number'),
            'Installation_Date' => $installation_date
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
        $hos = new HospitalTypeModel();
        $data = [
            'page_title' => 'Add Purchase Order',
            "pagename" => 'add-purchase',
            'hospital_names' => $hos->HospitalNames($id),
        ];
        $this->load->view('portal/view-po-items', $data);
    }
}
