<?php

class CitasModel extends CI_Model {

    public function __construct(){
        $this->load->database();
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
            $query = $this->db->get_where("Cliente", array("VendedorId" => $idVendedor));
            return $query->result();
        }
        return NULL;
    }

    public function getInmuebles() 
    {
        $query = $this->db->get("Inmueble");
        return $query->result(); 
    }

    public function getCitas()
    {
        $query = $this->db->query(
            "SELECT cl.Nombres, cl.Apellidos, c.NoCita, c.Fecha, c.Comentarios 
            FROM Cita c
	        INNER JOIN Cliente cl ON c.IdCliente = cl.Id");
        return $query->result();
    }

    public function insertarCita()
    {    
        $data = array(
            'idCliente' => $this->input->post('idCliente'),
            'noCita' => $this->input->post('noCita'),
            'fecha' => $this->input->post('fecha'),
            'comentarios' => $this->input->post('comentarios')
        );
        return $this->db->insert('Cita', $data);
    }
}