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
        $this->db->from('purchase_order a');
        $this->db->join('hospital_name b', 'b.id=a.Hospital_Name');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
