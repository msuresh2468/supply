<?php

class PurchaseModel extends CI_Model
{
    public function totalAmount(){
        $this->db->select_sum('Item_Amount');
        $this->db->from('purchase_order');
        $query = $this->db->get();
        return $query->result();
    }
    public function ReceivedAmount(){
        $this->db->select_sum('Payment_Received');
        $this->db->from('purchase_order');
        $query = $this->db->get();
        return $query->result();
    }
    // public function Outstanding(){
    //     $total = $this->db->select_sum('Item_Amount');
    //     $received = $this->db->select_sum('Payment_Received');
    //     $this->db->from('purchase_order');
    //     $this->db->where($total- $received);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function allPOs(){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewPO($id)
    {
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
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
