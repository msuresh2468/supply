<?php
class ProcumentModel extends CI_Model
{
    public function allprocurements(){
        $this->db->select('*');
        $this->db->from('procurement');
        //$this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertprocurement($data){
        $this->load->database();
        $this->db->insert('procurement', $data);
        return $this->db->insert_id();
    }
}
?>