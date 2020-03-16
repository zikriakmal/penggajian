<?php

class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('login/index');
        $this->load->view('footer');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data =[
            'username'=>$username,
            'password'=>md5($password)
        ];   
        $cek_login = $this->LoginModel->cek_login($data)->num_rows();
    
        if($cek_login>0){
            $data_session=[
                'username'=> $username   
            ];
            $this->session->set_userdata($data_session);
            redirect(base_url("welcome"));
        }
        else{
            redirect(base_url("login"));      
        }
    }
    public function logout(){
            $this->session->sess_destroy();
            redirect(base_url("login"));
    }
}