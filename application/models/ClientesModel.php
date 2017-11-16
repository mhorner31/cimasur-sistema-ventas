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
        $email = $this->input->post('email') == '' ?
            NULL : $this->input->post('email');

        $clienteData = array(
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'direccion' => $this->input->post('direccion'),
            'colonia' => $this->input->post('colonia'),
            'idMunicipio' => (int)$this->input->post('idMunicipio'),
            'email' => $email,
            'idComoSeEntero' => $this->input->post('idComoSeEntero'),
            'fechaIngreso' => date('Y-m-d\TH:i:s'),
            'hizoRecorrido' => (int)$this->input->post('hizoRecorrido'),
            'idVendedor' => $idVendedor
        );
        // Insertar los datos principales de la tabla Cliente
        $this->db->insert('Cliente', $clienteData);
        // Obtener Id del ultimo insert
        $clienteInsert_id = $this->db->insert_id();

        // Obtener los ids de los tipos de telefonos
        $tipoTelCasaId = $this->getIdFromTable('TipoTelefono', 'Nombre', 'Casa');
        $tipoTelCelId = $this->getIdFromTable('TipoTelefono', 'Nombre', 'Movil');
        $tipoTelOfiId = $this->getIdFromTable('TipoTelefono', 'Nombre', 'Oficina');

        // Insertar los telefonos

        //    CASA
        $telCasa = $this->input->post('telCasa');
        if(!$this->IsNullOrEmptyString($telCasa)) {
            $telData = array(
                'idTipo' => $tipoTelCasaId,
                'telefono' => $telCasa,
                'idCliente' => $clienteInsert_id
            );
            $this->db->insert('Telefono', $telData);
        }

        //    OFICINA
        $telOfi = $this->input->post('telOfi');
        if(!$this->IsNullOrEmptyString($telOfi)) {
            $telData = array(
                'idTipo' => $tipoTelOfiId,
                'telefono' => $telOfi,
                'idCliente' => $clienteInsert_id
            );
            $this->db->insert('Telefono', $telData);
        }

        //    CELULAR
        $telCel = $this->input->post('telCel');
        if(!$this->IsNullOrEmptyString($telCel)) {
            $telData = array(
                'idTipo' => $tipoTelCelId,
                'telefono' => $telCel,
                'idCliente' => $clienteInsert_id
            );
            $this->db->insert('Telefono', $telData);
        }

        // Si seleccionaron que fueron referenciados por cliente
        if ($this->input->post('idComoSeEntero') == '13') {
            
            $referenciadorData = array(
                'nombres' => $this->input->post('nombresRef'),
                'apellidos' => $this->input->post('apellidosRef'),
                'email' => $this->input->post('emailRef'),
                'telefono' => $this->input->post('telRef'),
            );
            $this->db->insert('Referenciador', $referenciadorData);
            // id del nuevo referenciador
            $referenciador_id = $this->db->insert_id();
            $clienteRefData = array(
                'idClienteDe' => $clienteInsert_id,
                'idReferenciador' => $referenciador_id
            );
            $this->db->insert('ClienteReferenciador', $clienteRefData);

        } else if ($this->input->post('idComoSeEntero') == '12') {

            $clienteRefData = array(
                'idClienteDe' => $clienteInsert_id,
                'idClienteRef' => $this->input->post('clienteReferenciador')
            );
            $this->db->insert('ClienteReferenciador', $clienteRefData);
        }
    }

    public function getIdFromTable($table, $filterCol, $filterVal) 
    {
        $this->db->select('id');
        $this->db->where($filterCol, $filterVal);
        $q = $this->db->get($table);
        $data = $q->result_array();
        return $data[0]['id'];
    }

    function IsNullOrEmptyString($question){
        return (!isset($question) || trim($question)==='');
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


    public function getListaClientes()
    {
        $sql = "SELECT c.id, c.Nombres, c.Apellidos, c.Email, c.FechaIngreso, c.HizoRecorrido, e.Descripcion as Enterado
        FROM Cliente c
        INNER JOIN ComoSeEntero e ON c.idComoSeEntero = e.id";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
}