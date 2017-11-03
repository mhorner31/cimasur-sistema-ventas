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

    public function getInmuebles(){
        $query = $this->db->query(
            "SELECT i.id, i.Nombre, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
             FROM Inmueble i
             INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
             INNER JOIN TipoInmueble t ON i.idTipo = t.id");
        return $query->result();
    }

    public function getCitas($id = NULL)
    {
        $sql = "SELECT * FROM (
                    SELECT c.id, cl.Nombres, cl.Apellidos, c.NoCita, c.Fecha, 
                        c.Comentarios, im.nombre as inmueble, ti.Nombre as Interesado
                    FROM Cita c
                    INNER JOIN Cliente cl ON c.IdCliente = cl.Id
                    INNER JOIN InmuebleCliente ic ON ic.idCita = c.id
                    INNER JOIN Inmueble im ON ic.idInmueble = im.Id 
                    INNER JOIN TipoInteresado ti ON ic.TipoInteresadoId = ti.id
                    ORDER BY cl.Nombres, cl.Apellidos, c.NoCita ) mt ";

        if ($id == NULL)
        {
            // Si no hay Id, entonces regresa todas las citas
            $query = $this->db->query($sql);
            return $query->result();
        } else {
            // Regresa solo la cita asociada a este Id
            $query = $this->db->query($sql . " WHERE mt.id = ?", array($id));
            return $query->row();
        }
    }

    public function insertarCita()
    {    
        $citaData = array(
            'idCliente' => $this->input->post('idCliente'),
            'noCita' => $this->input->post('noCita'),
            'fecha' => $this->input->post('fecha'),
            'comentarios' => $this->input->post('comentarios')
        );
        // Insertar los datos principales de la tabla Cita
        $this->db->insert('Cita', $citaData);
        // Obtener Id del ultimo insert
        $insert_id = $this->db->insert_id();

        // Insertar la relacion de cita - Inmueble
        $inmuebleData = array(
            'idCita' => $insert_id,
            'idInmueble' => $this->input->post('idInmueble'),
            'tipoInteresadoId' => $this->input->post('tipoInteresadoId'),
        );
        // Insertar datos de tabla secundaria 
        $this->db->insert('InmuebleCliente', $inmuebleData);
    }

    public function actualizarCita($id)
    {
        // Actualizar la cita
        $citaData = array(
            'idCliente' => $this->input->post('idCliente'),
            'noCita' => $this->input->post('noCita'),
            'fecha' => $this->input->post('fecha'),
            'comentarios' => $this->input->post('comentarios')
        );
        $this->db->where('id', $id);
        $this->db->update('Cita', $citaData);

        // Actualizar su inmueble
        $inmuebleData = array(
            'idInmueble' => $this->input->post('idInmueble'),
            'tipoInteresadoId' => $this->input->post('tipoInteresadoId'),
        );
        $this->db->where('idCita', $id);
        $this->db->update('InmuebleCliente', $inmuebleData);
    }
}