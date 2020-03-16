<?php

class GajiModel extends CI_Model{

    public $table='gaji';

    public function get_all(){
        return $this->db->get($this->table);
    }
    
    public function add($data){
       return $this->db->insert($this->table,$data);
    }


    public function getById($id){
        return $this->db->get_where($this->table,array('id'=>$id));
    }

    public function update($id,$data){
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function delete($id){
        return $this->db->delete($this->table, array('id' => $id)); 
    }

    public function getGaji($data){
        return $this->db->get_where('jabatan', array('id'=>$data[0]->jabatan))->result();
    }

    public function getBonus($data){
        $data=[
            "masa_kerja" => $data[0]->masa_kerja,
            "jabatan" => $data[0]->jabatan
        ];
        return $this->db->get_where('aturan_gaji', $data)->result();
    }
}