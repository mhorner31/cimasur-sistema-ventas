<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Clientes extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('ClientesModel');
            $this->load->helper('url_helper');
            $this->load->helper('html');
    }
     
    /**
     * Muestra la informacion 
     * en el listado de Citas
     */
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');

        $clientesModel = new ClientesModel;
        $data['clientes'] = $clientesModel->getClientes();

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/list', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function update($id = NULL) 
    {
        $ClientesModel = new ClientesModel;
        $data['Estados'] = $ClientesModel->getEstados();
        $data['ComoSeEntero'] = $ClientesModel->getComoSeEntero();
        $data['Clientes'] = $ClientesModel->getClientes();


        if ($id == NULL) {

            // Settear los valores de default
            $data['idCliente'] = 0;
            $data['nombres'] = "";
            $data['apellidos'] = "";
            $data['direccion'] = "";
            $data['colonia'] = "";
            $data['email'] = "";

            $data['nombresRef'] = "";
            $data['apellidosRef'] = "";
            $data['emailRef'] = "";

        } else {

        }

        // Cargar las vistas
        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/update', $data);
        $this->load->view('Clientes/javascript');
        $this->load->view('Plantilla/footer_app');
    }

    /**
     * Regresa los municipios asociados con el estado
     */
    public function municipiosPorEstado($idEdo) 
    {
        header('Content-Type: application/json');
        $ClientesModel = new ClientesModel;
        echo json_encode($ClientesModel->getMunicipios($idEdo));
    }

    /**
     * Inserta un nuevo registro de cliente
     */
    public function insertarNuevoCliente() 
    {
        if ($this->validateData()) {
            /*$ClientesModel = new ClientesModel;
            $ClientesModel->insertarCliente(1);
            redirect(base_url('index.php/Clientes/index'));*/
            echo "Done";
        } else {
            echo validation_errors();;
        }
    }

    public function validateData()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nombres', 'Nombres', 'trim|required');
        $this->form_validation->set_rules(
            'apellidos', 'Apellidos', 'trim|required');
        $this->form_validation->set_rules(
            'direccion', 'Direccion', 'trim|required');
        $this->form_validation->set_rules(
            'colonia', 'Colonia', 'trim|required');
        /*$this->form_validation->set_rules(
            'email', 'Email', 'trim|required|valid_email');*/
            
        return $this->form_validation->run();
    }

    public function postData($id)
    {
        if ($id == 0)
        {
            $this->insertarNuevoCliente();
        } 
        else 
        {
            $this->actualizarCita($id);
        }
    }
}