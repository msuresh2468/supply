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
        // $this->db->select('*');
        // $this->db->from('hospital_name');
        // $this->db->where('type_id', $type_id);
        // $query = $this->db->get();
        // print_r($query);die;
        //return $query->result();
        $this->db->where('type_id', $type_id);
        $names = $this->db->get('hospital_name')->result_array();
        return $names;
    }
}
