<?php

class PurchaseModel extends CI_Model
{
    public function totalAmount()
    {
        $this->db->select_sum('Gross_Amount');
        $this->db->select_sum('Payment_Received');
        $this->db->from('po_details');
        $query = $this->db->get();
        return $query->result();
    }

    public function allPOs()
    {
        $this->db->select('*');
        //$this->db->select_sum('Item_Amount');
        $this->db->from('po_details');
        $this->db->group_by('PO_Number');
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
    public function supplied(){
        $this->db->select('*');
        $this->db->from('po_item_details');
        //$this->db->where('Supply_Status', 'Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function notsupplied(){
        $this->db->select('*');
        $this->db->from('po_item_details');
        //$this->db->where('Supply_Status', 'Not Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function status()
    {
        $this->db->select('*');
        $this->db->from('po_details');
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
        $this->db->select('*');           
        $this->db->from('po_associate_hospitals a');        
        $this->db->join('po_item_details c', 'c.po_id=a.item_po_id');        
        $this->db->where('a.id',$id);        
        $query = $this->db->get();
        return $query->row();
    }
    public function insertpo($data)
    {
        $this->load->database();
        $this->db->insert('po_details', $data);
        return $this->db->insert_id();
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
}
