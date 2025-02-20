<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Authentication extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('authenticated')){
            if($this->session->userdata('authenticated') == '1')
            {
                // echo 'user';
            }
        }
        else{
            $this->session->set_flashdata('status','Please enter credentials');
            redirect(base_url('home'));
        }
    }
}