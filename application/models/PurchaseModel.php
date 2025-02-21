<?php

class PurchaseModel extends CI_Model
{
    public function totalAmount(){
        $this->db->select_sum('Item_Amount');
        $this->db->from('purchase_order');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertPO($data)
    {
        $this->load->database();
        return $this->db->insert('purchase_order', $data);
    }
    public function editjob($id)
    {
        $this->load->database();
        $query = $this->db->get_where('purchase_order', ['id' => $id]);
        return $query->row();
    }
    public function updatejob($data, $id)
    {
        $this->load->database();
        return $this->db->update('purchase_order', $data, ['id' => $id]);
    }
    public function deletejob($id)
    {
        return $this->db->delete('purchase_order', ['id' => $id]);
    }
}
