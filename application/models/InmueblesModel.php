<?php

class InmueblesModel extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function getTipoInmueble()
    {
            $query = $this->db->get("TipoInmueble");
            return $query->result();
    }
}

?>