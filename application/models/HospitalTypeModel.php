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
    public function viewHospitalType($id)
    {
        $this->db->select('*');
        $this->db->from('item_order_details a');
        $this->db->join('hospital_type b', 'b.id=a.Hospital_Type');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function HospitalName($id){
        $this->db->select('*');
        $this->db->from('item_order_details a');
        $this->db->join('hospital_name b', 'b.id=a.Hospital_Name');
        $query = $this->db->where('a.po_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function HospitalNames($id){
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $query = $this->db->where('a.item_po_id', $id);
        //$this->db->join('po_details b', 'b.id=a.item_po_id');
        $this->db->join('item_order_details c', 'c.po_id=a.item_po_id');
       
        
        $query = $this->db->get();
        print_r($query->row());die;
        return $query->result();
    }
    
}
