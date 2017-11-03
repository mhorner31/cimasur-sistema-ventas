<?php

class LoginAppModel extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    // Leer usuario y password
    public function login($nickname, $password) {
    
        $condition = "nickname =" . "'" . $nickname . "' AND " . "password =" . "'" . $password. "'";
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function informacion_usuario($nickname) {
        
        $condition = "nickname =" . "'" . $nickname . "'";
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}