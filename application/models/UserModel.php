<?php

class UserModel extends CI_Model
{    
    public function loginUser($data){
        $this->db->select('*');
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $this->db->from('users');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }
        else{
            return false;
        }
    }
    public function registerUser($data){
        $this->load->database();
        return $this->db->insert('users', $data);
    }
}
