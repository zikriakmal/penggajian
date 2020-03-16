<?php

class AturanGajiModel extends CI_Model{

    public $table='aturan_gaji';

    public function get_all(){
        // $this->db->select('*');
        // $this->db->from($this->table);
        // $this->db->join('jabatan', 'jabatan.id = aturan_gaji.jabatan');
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


}