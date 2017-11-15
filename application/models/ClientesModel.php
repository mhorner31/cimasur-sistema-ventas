<?php

class ClientesModel extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    /**
     * Trae todos los estados
     */
    public function getEstados()
    {
        $query = $this->db->get("Estados");
        return $query->result();        
    }

    /**
     * Trae la lista completa de municipios
     */
    public function getMunicipios($idEdo)
    {
        $query = $this->db->get_where("Municipios", array("estado_id" => $idEdo));
        return $query->result();    
    }

    /**
     * Traer la enumeración de Como Se Entero
     */
    public function getComoSeEntero()
    {
        $query = $this->db->get("ComoSeEntero");
        return $query->result();        
    }

    /**
     * Traer todos los clientes
     */
    public function getClientes() 
    {
        $sql = "SELECT c.id, c.Nombres, c.Apellidos, c.Ciudad, c.Estado, c.Email, c.FechaIngreso, c.HizoRecorrido, e.Descripcion as Enterado
                FROM Cliente c
                INNER JOIN ComoSeEntero e ON c.idComoSeEntero = e.id";
        $query = $this->db->query($sql);
        return $query->result(); 
    }

    public function insertarCliente($idVendedor)
    {    
        $clienteData = array(
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'direccion' => $this->input->post('direccion'),
            'colonia' => $this->input->post('colonia'),
            'idMunicipio' => $this->input->post('idMunicipio'),
            'email' => $this->input->post('email'),
            'idComoSeEntero' => $this->input->post('idComoSeEntero'),
            'fechaIngreso' => date('Y-m-d\TH:i:s'),
            'hizoRecorrido' => $this->input->post('hizoRecorrido'),
            'idVendedor' => $idVendedor
        );
        // Insertar los datos principales de la tabla Cita
        $this->db->insert('Cliente', $citaData);
        // Obtener Id del ultimo insert
        $clienteInsert_id = $this->db->insert_id();

        /*// Insertar la relacion de cita - Inmueble
        $inmuebleData = array(
            'idCita' => $insert_id,
            'idMunicipio' => $this->input->post('idInmueble'),
            'tipoInteresadoId' => $this->input->post('tipoInteresadoId'),
        );
        // Insertar datos de tabla secundaria 
        $this->db->insert('InmuebleCliente', $inmuebleData);*/
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