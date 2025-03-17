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
    public function countPO()
    {
        $count = $this->db->query('SELECT * FROM po_details');
        return $count = $count->num_rows();
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
    public function supplied()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.po_id=a.item_po_id');
        $this->db->join('po_details c', 'c.PO_Number=a.item_po_id');
        $this->db->group_by('PO_Number');
        $this->db->where('supply_status', 'Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function notsupplied()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.po_id=a.item_po_id');
        $this->db->join('po_details c', 'c.PO_Number=a.item_po_id');
        $this->db->group_by('PO_Number');
        $this->db->where('supply_status', 'Not Supplied');
        $query = $this->db->get();
        return $query->result();
    }
    public function installed()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.po_id=a.item_po_id');
        $this->db->join('po_details c', 'c.PO_Number=a.item_po_id');
        $this->db->group_by('PO_Number');
        $this->db->where('Installation_Date !=', '');
        $query = $this->db->get();
        return $query->result();
    }
    public function notinstalled()
    {
        $this->db->select('*');
        $this->db->from('po_associate_hospitals a');
        $this->db->join('po_item_details b', 'b.po_id=a.item_po_id');
        $this->db->join('po_details c', 'c.PO_Number=a.item_po_id');
        $this->db->group_by('PO_Number');
        $this->db->where('Installation_Date', ' ');
        $query = $this->db->get();
        return $query->result();
    }
    public function afterCutoffinstalled()
    {
        $this->db->select('p.Installation_Date, po.PO_Year, po.PO_Number, po.id,po.PO_Date,po.File_Number,pi.Item_Name, po.Supply_DueDate, p.supply_status');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_details po', 'p.item_po_id = po.PO_Number');
        $this->db->join('po_item_details pi', 'pi.po_id = p.item_po_id');
        $this->db->where('Installation_Date !=', '');
        $this->db->group_start();
        $this->db->where('Installation_Date >', 'Supply_DueDate', FALSE);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }
    public function beforeCutoffinstalled()
    {
        $this->db->select('p.Installation_Date, po.PO_Year, po.PO_Number, po.id,po.PO_Date,po.File_Number,pi.Item_Name, po.Supply_DueDate, p.supply_status');
        $this->db->from('po_associate_hospitals p');
        $this->db->join('po_details po', 'p.item_po_id = po.PO_Number');
        $this->db->join('po_item_details pi', 'pi.po_id = p.item_po_id');
        $this->db->where('Installation_Date !=', '');
        $this->db->group_start();
        $this->db->where('Installation_Date <', 'Supply_DueDate', FALSE);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
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
        $this->db->group_by('PO_Number');
        $query = $this->db->get();
        return $query->result();
    }
    public function agreements()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->where('Is_Agreement', 'Yes');
        $query = $this->db->get();
        return $query->result();
    }
    public function dd()
    {
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->where('Is_DD', 'Yes');
        $query = $this->db->get();
        return $query->result();
    }
    public function viewPO($id)
    {
        $this->db->select('*');
        $this->db->from('po_details');
        $this->db->where('PO_Number', $id);
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
        $this->db->select('*');
        $this->db->from('po_item_details a');
        $this->db->join('po_associate_hospitals c', 'c.item_po_id=a.po_id');
        $this->db->where('c.id', $id);
        //$query = $this->db->group_by('po_hospital_name'); 
        $query = $this->db->get();
        return $query->row();
    }
    public function insertpo($data)
    {
        $this->load->database();
        $this->db->insert('po_details', $data);
        //return $this->db->insert_id();
        return $this->input->post('po_number');
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
