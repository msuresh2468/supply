<?php

class PurchaseModel extends CI_Model
{
    public function totalAmount()
    {
        $this->db->select_sum('Gross_Amount');
        $this->db->select_sum('Pay_60_Amt');
        $this->db->select_sum('Pay_30_Amt');
        $this->db->select_sum('Pay_10_Amt');
        $this->db->select_sum('Pay_90_Amt');
        $this->db->select_sum('LDC_Amount1');
        $this->db->select_sum('LDC_Amount2');
        $this->db->select_sum('LDC_Amount3');
        $this->db->select_sum('Deductions_1');
        $this->db->select_sum('Deductions_2');
        $this->db->select_sum('Deductions_3');
        $this->db->select_sum('Bills_60_Amount');
        $this->db->select_sum('Bills_30_Amount');
        $this->db->select_sum('Bills_90_Amount');
        $this->db->select_sum('Bills_10_Amount');
        $this->db->from('po_details');
        $query = $this->db->get();
        return $query->result();
    }

    public function allPOs()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        //$this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function countPOs(){
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function countSupplied(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals');
        $this->db->group_by('id');
        $this->db->where('supply_status', 'Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function countNotSupplied(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals');
        $this->db->group_by('id');
        $this->db->where('supply_status', 'Not Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function countInstalled(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals');
        $this->db->group_by('id');
        $this->db->where('Installation_Date !=', '');
        $query = $this->db->get();
        return $query->result();
    }
    public function countNotInstalled(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals');
        $this->db->group_by('id');
        $this->db->where('Installation_Date !=', '');
        $query = $this->db->get();
        return $query->result();
    }
    public function PODetails($id)
    {
        $this->db->select('*');
        $this->db->from('po_item_details');
        $this->db->where('po_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function supplied()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.id=a.item_id');
        $this->db->join('po_details c', 'c.id=b.po_id');
        //$this->db->group_by('a.id');
        $this->db->where('supply_status', 'Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function notsupplied()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.id=a.item_id');
        $this->db->join('po_details c', 'c.id=b.po_id');
        //$this->db->group_by('a.id');
        $this->db->where('supply_status', 'Not Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function installed()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.id=a.item_id');
        $this->db->join('po_details c', 'c.id=b.po_id');
        //$this->db->group_by('a.id');
        $this->db->where('Installation_Date !=', '');
        $query = $this->db->get();
        return $query->result();
    }
    public function notinstalled()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.id=a.item_id');
        $this->db->join('po_details c', 'c.id=b.po_id');
        //$this->db->group_by('a.id');
        $this->db->where('Installation_Date', ' ');
        $query = $this->db->get();
        return $query->result();
    }
    public function afterCutoffinstalled()
    {
        $this->db->select('p.Installation_Date, po.PO_Year, po.PO_Number, po.id,po.PO_Date,po.File_Number,pid.Item_Name,pid.Item_Qty, p.po_hospital_name, po.Supply_DueDate, p.supply_status');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_item_details pid', 'pid.po_id = p.item_id');
        $this->db->join('po_details po', 'po.id = pid.po_id');
        $this->db->group_by('p.id');
        $this->db->where('Installation_Date !=', '');
        $this->db->group_start();
        $this->db->where('Installation_Date >', 'Supply_DueDate', FALSE);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }
    public function beforeCutoffinstalled()
    {
        $this->db->select('p.Installation_Date, po.PO_Year, po.PO_Number, po.id,po.PO_Date,po.File_Number,pid.Item_Name, pid.Item_Qty, po.Supply_DueDate, p.po_hospital_name,  p.supply_status');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_item_details pid', 'pid.po_id = p.item_id');
        $this->db->join('po_details po', 'po.id = pid.po_id');
        $this->db->group_by('p.id');
        $this->db->where('Installation_Date !=', '');
        $this->db->group_start();
        $this->db->where('Installation_Date <', 'Supply_DueDate', FALSE);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }
    public function warranty(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_item_details pi', 'pi.po_id = p.item_id');
        $this->db->join('po_details po', 'po.id = pi.po_id');
        //$this->db->group_by('p.id');
        $this->db->where('Warranty_Date >', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }
    public function expired(){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_item_details pi', 'pi.po_id = p.item_id');
        $this->db->join('po_details po', 'po.id = pi.po_id');
        $this->db->where('Warranty_Date !=', '');
        $this->db->where('Warranty_Date <', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
        
    }
    public function ldc(){

    }
    
    public function status()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->where('Is_Agreement', 'Yes');
        $query = $this->db->get();
        return $query->result();
    }
    public function paymentDetails()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        //$this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function agreements()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        //$this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function dd()
    {
        $this->db->select('*');
        $this->db->from('po_details');
       // $this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewPO($id)
    {
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function editPO($id)
    {
        $this->load->database();
        $query = $this->db->get_where('po_details', ['id' => $id]);
        return $query->row();
    }
    public function editPOItem($id)
    {
        // $this->load->database();
        // $query = $this->db->get_where('po_item_details', ['id' => $id]);
        // return $query->row();
        // $this->db->select('*');           
        // $this->db->from('po_associate_hospitals a');        
        // $this->db->join('po_item_details c', 'c.po_id=a.item_po_id');        
        // $this->db->where('a.id',$id);        
        // $query = $this->db->get();
        // return $query->row();
        $this->db->select('pid.Item_Name, pah.Hospital_Type, pid.Item_Qty, pid.Unit_Rate, pid.Item_Model, pah.po_hospital_name, pah.District, pah.id, pah.supply_status, pd.PO_Year, pd.PO_Number, pah.Delivery_Date, pah.Installation_Date, pah.Warranty_Years, pah.Warranty_Date, pah.Stock_Entry_Page_Number');           
        $this->db->from('po_associate_hospitals pah');   
        $this->db->join('po_item_details pid', 'pid.id=pah.item_id');      
        $this->db->join('po_details pd', 'pd.id=pid.po_id');        
              
        $this->db->where('pah.id',$id);        
        //$query = $this->db->group_by('po_hospital_name'); 
        $query = $this->db->get();
        return $query->row();
        // $this->db->select('*');
        // $this->db->from('po_associate_hospitals pah');
        // $this->db->join('po_item_details pid', 'pah.item_id=pid.id');
        // $this->db->where('pah.item_id', $id);
        // //$query = $this->db->group_by('po_hospital_name'); 
        // $query = $this->db->get();
        // return $query->row();
    }
    public function insertpo($data)
    {
        $this->load->database();
        $this->db->insert('po_details', $data);
        return $this->db->insert_id();
        //return $this->input->post('id');
    }
    public function insertpoitem($data){
        $this->load->database();
        $this->db->insert('po_item_details', $data);
        //return $this->db->insert_id();
        $last_inserted_id = $this->db->insert_id();
        return $last_inserted_id;
    }
    public function updatePO($data, $id)
    {
        $this->load->database();
        return $this->db->update('po_details', $data, ['id' => $id]);
    }
    public function updatePOItem($data, $id)
    {
        $this->load->database();
        return $this->db->update('po_associate_hospitals', $data, ['id' => $id]);
    }
    public function search($keyword)
    {
        $this->db->like('po_hospital_name', $keyword);
        $this->db->or_like('item_po_id', $keyword);
        $this->db->or_like('po_details.PO_Number',$keyword);
        $this->db->or_like('po_details.PO_Year',$keyword);
        $this->db->or_like('po_item_details.po_id',$keyword);
        $this->db->or_like('po_item_details.Item_Name',$keyword);
        $this->db->join('po_details','po_associate_hospitals.item_po_id = po_details.PO_Number');
        $this->db->join('po_item_details','po_associate_hospitals.item_po_id = po_item_details.po_id');
        return $this->db->get('po_associate_hospitals')->result_array();
    }
}
