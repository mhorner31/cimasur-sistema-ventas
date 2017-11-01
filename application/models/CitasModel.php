<?php

class CitasModel extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function insertCita() {
        
    }

    public function getTipoInteresadoEnum()
    {
        $query = $this->db->get("TipoInteresado");
        return $query->result();        
    }

    public function getClientesPorVendedor($idVendedor) 
    {
        if ($idVendedor != NULL)
        {
            $query = $this->db->get_where('Cliente', array('id' => $idVendedor));
            return $query->row_array();
        }
        return NULL;
    }

    public function getInmuebles() 
    {
        $query = $this->db->get("Inmueble");
        return $query->result(); 
    }
}