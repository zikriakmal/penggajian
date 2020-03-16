<?php

class KaryawanModel extends CI_Model{

    public $table='karyawan';

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

}