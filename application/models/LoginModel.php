<?php

class LoginModel extends CI_Model{
    public $table='user';

    public function cek_login($data){
        return $this->db->get_where($this->table,$data);
    }

}