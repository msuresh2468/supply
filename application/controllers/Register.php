<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }
    public function index()
    {
        //helper(['form']);
        $data = [
            'page_title' => 'Register',
            'page_description' => 'Home Page Description',
            "pagename" => 'careers',
        ];
        //return view('register', $data);
        $this->load->view('register', $data);
    }
    public function do_register()
    {
        
        $this->form_validation->set_rules('username', 'User name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        }
        else{
            $data = array(
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            $register_user = new UserModel;
            $check = $register_user->registerUser($data);
            if($check){
                $this->session->set_flashdata('status', 'Registered Successfully');
                redirect(base_url('home'));
            }
            else{
                $this->session->set_flashdata('status', 'Registered Failed');
                redirect(base_url('register'));
            }
        }
    }
}
