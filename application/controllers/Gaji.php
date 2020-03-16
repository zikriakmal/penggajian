<?php

class Gaji extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('GajiModel');
    }


    public function index(){
        $this->load->model('KaryawanModel');
        $allKaryawan = $this->KaryawanModel->get_all()->result();
        $all = $this->GajiModel->get_all()->result();
        $data = [
            'data' => $all,
            'allKaryawan'=> $allKaryawan
        ];
        $this->load->view('header',['head'=>"gaji"]);
        $this->load->view('main',['menu'=>"gaji"]);
        $this->load->view('gaji/index', $data);
        $this->load->view('footer');
    }

    public function create(){
        $back='<a href="'.base_url().'gaji" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
        $this->load->view('header',['head'=>"gaji"]);
        $this->load->view('main',['back'=>$back,'menu'=>"gaji-create"]);
        $this->load->view('gaji/create');
        $this->load->view('footer');
    }

    public function add(){
        $data = [
            'kode_penggajian' => rand(10,3000),
            'nip' => $this->input->post('nip'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'tanggal_penerimaan' => $this->input->post('tanggal_penerimaan'),
            'nominal' => $this->input->post('nominal'),
        ];
        $insert = $this->GajiModel->add($data);

        if ($insert) {
            $this->session->set_flashdata('result', 'Sukses menambahkan data');
            redirect(base_url("gaji"));
        } else {
            redirect(base_url("gaji"));
        }
    }

    public function edit(){
        $gajidata = $this->GajiModel->getById($this->uri->segment(3))->result();
        $data = [
            "data" => $gajidata
        ];

        $back='<a href="'.base_url().'gaji" class="mr-2"> <i class="fa fa-chevron-left"></i></a>';
            
        $this->load->view('header',['head'=>"gaji"]);
        $this->load->view('main',['back'=>$back,'menu'=>"gaji-edit"]);
        $this->load->view('gaji/edit',$data);
        $this->load->view('footer');
    }

    public function update(){
        $id=$this->uri->segment(3);
        $data = [
            'gaji' => $this->input->post('gaji'),
            'standar_gaji' => $this->input->post('standar_gaji'),
            'keterangan' => $this->input->post('keterangan'),
        ];
    $update = $this->GajiModel->update($id,$data);

    if ($update) {
        $this->session->set_flashdata('result', 'Berhasil update data');
        redirect(base_url("gaji/edit/".$id));
    } else {
        redirect(base_url("gaji/edit".$id));
    }

    }

    public function delete(){
        $id=$this->uri->segment(3);
        $delete = $this->GajiModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('result', 'Berhasil hapus data');
            redirect(base_url("gaji"));
        } else {
            redirect(base_url("gaji"));
        }

    }

    public function getpegawai(){
        $this->load->model('KaryawanModel');
        // $this->load->model('AturanGajiModel');
        $Karyawan = $this->KaryawanModel->getById($this->input->post("id"))->result();
        
        $gajiTotal = $this->GajiModel->getGaji($Karyawan);
        $bonus = $this->GajiModel->getBonus($Karyawan);

        $gajinya=$gajiTotal[0]->standar_gaji;
        if(isset($bonus[0]->insentif)){
            $gajinya = $gajinya + $bonus[0]->insentif + $bonus[0]->bonus;
        }
        else{
            $gajinya;
        }
        $data = '
        <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input class="form-control" type="text" name="nama_karyawan" value="'.$Karyawan[0]->nama.'" readonly>
            </div>
        <div class="form-group">
                <label for="exampleInputPassword1">NIP</label>
                <input class="form-control" type="text" name="nip" value="'.$Karyawan[0]->NIP.'" readonly>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Total Gaji</label>
            <input class="form-control" type="number" name="nominal" value="'.$gajinya.'" readonly>
        </div>

        ';
        echo $data;
    }
}