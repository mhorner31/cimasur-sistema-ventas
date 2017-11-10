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

        $citasModel = new CitasModel;
        $data['Citas'] = $citasModel->getCitas();

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Citas/list', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function update($id = NULL) 
    {
        $ClientesModel = new ClientesModel;
        $data['Estados'] = $ClientesModel->getEstados();
        $data['ComoSeEntero'] = $ClientesModel->getComoSeEntero();


        if ($id == NULL) {
            // Settear los valores de default
            $data['nombres'] = "";
            $data['apellidos'] = "";
            $data['direccion'] = "";
            $data['colonia'] = "";
            $data['email'] = "";

        } else {
            
            // Settear los valores de la BD
            $cita = $citasModel->getCitas($id);

            $data['IdCita'] = $id;
            $data['fecha'] = date('Y-m-d\TH:i:s', strtotime($cita->Fecha));
            $data['noCita'] = $cita->NoCita;
            $data['comentarios'] = $cita->Comentarios;
        }

        // Cargar las vistas
        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/update', $data);
        $this->load->view('Clientes/javascript');
        $this->load->view('Plantilla/footer_app');
    }


    public function municipiosPorEstado($idEdo) 
    {
        header('Content-Type: application/json');
        $ClientesModel = new ClientesModel;
        echo json_encode($ClientesModel->getMunicipios($idEdo));
    }


    public function postData($id)
    {
        if ($id == 0)
        {
            $this->insertarNuevaCita();
        } 
        else 
        {
            $this->actualizarCita($id);
        }
    }

    public function insertarNuevaCita() 
    {
        $citasModel = new CitasModel;
        $citasModel->insertarCita();
        redirect(base_url('index.php/citas/index'));
    }

    public function actualizarCita($id) 
    {
        $citasModel = new CitasModel;
        $citasModel->actualizarCita($id);
        redirect(base_url('index.php/citas/index'));
    }
}