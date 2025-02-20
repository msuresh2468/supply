<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('authenticated'))
        {
            $this->session->set_flashdata('status', 'You are already Loggedin');
            redirect(base_url('portal/index'));
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }
    public function index()
    {
        $data = [
            'page_title' => 'Login',
            'page_description' => 'Login Page Description',
            "pagename" => 'Login',
        ];
        //return view('login', $data);
        $this->load->view('login', $data);
    }
    public function do_login()
    {
        $this->form_validation->set_rules('username', 'User name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );
            $user = new UserModel;
            $result = $user->loginUser($data);
            if ($result != FALSE) {   
                $auth_userdetails = [
                    'username' => $result->username
                ];
                $this->session->set_userdata('authenticated','1');
                $this->session->set_userdata('auth_user',$auth_userdetails);
                $this->session->set_flashdata('status', 'Welcome to '.$result->username);             
                redirect(base_url('portal/index'));
            } else {
                $this->session->set_flashdata('status', 'Invalid Credentials');
                redirect(base_url('home'));
            }
        }
    }
}
