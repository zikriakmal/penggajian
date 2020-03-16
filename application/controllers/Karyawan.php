<?php

class Karyawan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('KaryawanModel');
        $this->load->helper('url');
    }


    public function index()
    {
        $all = $this->KaryawanModel->get_all()->result();
        $data = [
            'data' => $all
        ];
        $this->load->view('header',['head'=>"karyawan"]);
        $this->load->view('main',['menu'=>"karyawan"]);
        $this->load->view('karyawan/index', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->model('JabatanModel');
        $dataJabatan= $this->JabatanModel->get_all()->result();
        $back='<a href="'.base_url().'karyawan" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
        $this->load->view('header',['head'=>"karyawan"]);
        $this->load->view('main',['back'=>$back,'menu'=>"karyawan-create"]);
        $this->load->view('karyawan/create',["dataJabatan"=>$dataJabatan]);
        $this->load->view('footer');
    }

    public function add()
    {
        $data = [
            'NIP' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tanggal_lahir'),
            'telp' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),
            'masa_kerja' => $this->input->post('masa_kerja'),
        ];
        $insert = $this->KaryawanModel->add($data);

        if ($insert) {
            $this->session->set_flashdata('result', 'Sukses menambahkan data');
            redirect(base_url("karyawan/create"));
        } else {
            redirect(base_url("karyawan/create"));
        }
    }

    public function edit()
    {
        $this->load->model('JabatanModel');
        $dataJabatan= $this->JabatanModel->get_all()->result();
        $karyawanData = $this->KaryawanModel->getById($this->uri->segment(3))->result();
        $data = [
            "data" => $karyawanData,
            "dataJabatan"=>$dataJabatan
        ];

        $back='<a href="'.base_url().'karyawan" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
            
        $this->load->view('header',['head'=>"karyawan"]);
        $this->load->view('main',['back'=>$back,'menu'=>"karyawan-edit"]);
        $this->load->view('karyawan/edit',$data);
        $this->load->view('footer');
    }

    public function update()
    { 
        $id=$this->uri->segment(3);
        $data = [
        'NIP' => $this->input->post('nip'),
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tgl_lahir' => $this->input->post('tanggal_lahir'),
        'telp' => $this->input->post('telephone'),
        'email' => $this->input->post('email'),
        'alamat' => $this->input->post('alamat'),
        'jabatan' => $this->input->post('jabatan'),
        'masa_kerja' => $this->input->post('masa_kerja'),
    ];
    $update = $this->KaryawanModel->update($id,$data);

    if ($update) {
        $this->session->set_flashdata('result', 'Berhasil update data');
        redirect(base_url("karyawan/edit/".$id));
    } else {
        redirect(base_url("karyawan/edit/".$id));
    }
    
    }

    public function delete()
    {
        $id=$this->uri->segment(3);
        $delete = $this->KaryawanModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('result', 'Berhasil hapus data');
            redirect(base_url("karyawan"));
        } else {
            redirect(base_url("karyawan"));
        }
    }
}
