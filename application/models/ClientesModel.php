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
        $query = $this->db->get("Cliente");
        return $query->result();
    }

    public function getListaClientes()
    {
        $sql = "SELECT c.id, c.Nombres, c.Apellidos, c.Email, c.FechaIngreso, c.HizoRecorrido, 
            e.Descripcion as Enterado
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
}