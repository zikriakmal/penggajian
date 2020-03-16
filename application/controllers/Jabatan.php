<?php

class Jabatan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('JabatanModel');
    }


    public function index(){
        $all = $this->JabatanModel->get_all()->result();
        $data = [
            'data' => $all
        ];
        $this->load->view('header',['head'=>"jabatan"]);
        $this->load->view('main',['menu'=>"jabatan"]);
        $this->load->view('jabatan/index', $data);
        $this->load->view('footer');
    }

    public function create(){
        $back='<a href="'.base_url().'jabatan" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
        $this->load->view('header',['head'=>"jabatan"]);
        $this->load->view('main',['back'=>$back,'menu'=>"jabatan-create"]);
        $this->load->view('jabatan/create');
        $this->load->view('footer');
    }

    public function add(){
        $data = [
            'jabatan' => $this->input->post('jabatan'),
            'standar_gaji' => $this->input->post('standar_gaji'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $insert = $this->JabatanModel->add($data);

        if ($insert) {
            $this->session->set_flashdata('result', 'Sukses menambahkan data');
            redirect(base_url("jabatan/create"));
        } else {
            redirect(base_url("jabatan/create"));
        }
    }

    public function edit(){
        $jabatandata = $this->JabatanModel->getById($this->uri->segment(3))->result();
        $data = [
            "data" => $jabatandata
        ];

        $back='<a href="'.base_url().'jabatan" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
            
        $this->load->view('header',['head'=>"jabatan"]);
        $this->load->view('main',['back'=>$back,'menu'=>"jabatan-edit"]);
        $this->load->view('jabatan/edit',$data);
        $this->load->view('footer');
    }

    public function update(){
        $id=$this->uri->segment(3);
        $data = [
            'jabatan' => $this->input->post('jabatan'),
            'standar_gaji' => $this->input->post('standar_gaji'),
            'keterangan' => $this->input->post('keterangan'),
        ];
    $update = $this->JabatanModel->update($id,$data);

    if ($update) {
        $this->session->set_flashdata('result', 'Berhasil update data');
        redirect(base_url("jabatan/edit/".$id));
    } else {
        redirect(base_url("jabatan/edit/".$id));
    }

    }

    public function delete(){
        $id=$this->uri->segment(3);
        $delete = $this->JabatanModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('result', 'Berhasil hapus data');
            redirect(base_url("jabatan"));
        } else {
            redirect(base_url("jabatan"));
        }

    }
}