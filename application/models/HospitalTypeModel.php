<?php
class HospitalTypeModel extends CI_Model
{
    public function getTypes()
    {
        $this->db->select('*');
        $this->db->from('hospital_type');
        $query = $this->db->get();
        return $query->result();
    }
    public function getNames($type_id)
    {
        $this->db->where('type_id', $type_id);
        $names = $this->db->get('hospital_name')->result_array();
        return $names;
    }
    public function viewHospitalName($id)
    {
        $this->db->select('*');
        $this->db->from('item_order_details a');
        $this->db->join('hospital_name b', 'b.id=a.Hospital_Name');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    // public function viewHospitalType($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('hospital_type a');
    //     $this->db->join('po_item_details b', 'b.Hospital_Type=a.id');
    //     $this->db->join('po_associate_hospitals c', 'c.item_po_id=b.po_id');
    //     $this->db->where('c.id', $id);
    //     $query = $this->db->get();
    //     return $query->row();
    // }
    public function HospitalName($id){
        $this->db->select('*');
        $this->db->from('item_order_details a');
        $this->db->join('hospital_name b', 'b.id=a.Hospital_Name');
        $query = $this->db->where('a.po_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function HospitalNames($id){
        $this->db->select('pid.Item_Name, pid.Item_Qty, pid.Unit_Rate, pid.Item_Model, pah.po_hospital_name, pah.District, pah.id, pah.supply_status, pd.PO_Year, pd.PO_Number,');           
        $this->db->from('po_item_details pid');   
        $this->db->join('po_details pd', 'pd.PO_Number=pid.po_id');      
        $this->db->join('po_associate_hospitals pah', 'pah.item_id=pid.id');        
              
        $this->db->where('pid.po_id',$id);        
        //$query = $this->db->group_by('po_hospital_name'); 
        $query = $this->db->get();
        return $query->result();
    }
    
}
