<?php

class AturanGaji extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AturanGajiModel');
    }

    public function index(){
        $all = $this->AturanGajiModel->get_all()->result();
        // var_dump($all);
        // die();
        $data = [
            'data' => $all
        ];
        $this->load->view('header',['head'=>"AturanGaji"]);
        $this->load->view('main',['menu'=>"AturanGaji"]);
        $this->load->view('aturan-gaji/index', $data);
        $this->load->view('footer');
    }

    public function create(){
        $this->load->model('JabatanModel');
        $dataJabatan= $this->JabatanModel->get_all()->result();
        $back='<a href="'.base_url().'AturanGaji" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
        $this->load->view('header',['head'=>"AturanGaji"]);
        $this->load->view('main',['back'=>$back,'menu'=>"AturanGaji-create"]);
        $this->load->view('aturan-gaji/create',["dataJabatan"=>$dataJabatan]);
        $this->load->view('footer');
    }

    public function add(){
        $data = [
            'jabatan' => $this->input->post('jabatan'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'insentif' => $this->input->post('insentif'),
            'bonus' => $this->input->post('bonus'),
        ];
        $insert = $this->AturanGajiModel->add($data);

        if ($insert) {
            $this->session->set_flashdata('result', 'Sukses menambahkan data');
            redirect(base_url("AturanGaji/create"));
        } else {
            redirect(base_url("AturanGaji/create"));
        }
    }

    public function edit(){
        $this->load->model('JabatanModel');
        $dataJabatan= $this->JabatanModel->get_all()->result();
        $AturanGajidata = $this->AturanGajiModel->getById($this->uri->segment(3))->result();
        $data = [
            "data" => $AturanGajidata,
            "dataJabatan"=>$dataJabatan
        ];
        $back='<a href="'.base_url().'AturanGaji" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
            
        $this->load->view('header',['head'=>"AturanGaji"]);
        $this->load->view('main',['back'=>$back,'menu'=>"AturanGaji-edit"]);
        $this->load->view('aturan-gaji/edit',$data);
        $this->load->view('footer');
    }

    public function update(){
        $id=$this->uri->segment(3);
        $data = [
            'jabatan' => $this->input->post('jabatan'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'insentif' => $this->input->post('insentif'),
            'bonus' => $this->input->post('bonus'),
        ];
    $update = $this->AturanGajiModel->update($id,$data);

    if ($update) {
        $this->session->set_flashdata('result', 'Berhasil update data');
        redirect(base_url("AturanGaji/edit/".$id));
    } else {
        redirect(base_url("AturanGaji/edit/".$id));
    }

    }

    public function delete(){
        $id=$this->uri->segment(3);
        $delete = $this->AturanGajiModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('result', 'Berhasil hapus data');
            redirect(base_url("AturanGaji"));
        } else {
            redirect(base_url("AturanGaji"));
        }

    }
}