<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Citas extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('CitasModel');
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

        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('Citas/list', $data);
        $this->load->view('footer_app');
    }

    public function update($id = NULL) 
    {
        $citasModel = new CitasModel;
        $data['Clientes'] = $citasModel->getClientesPorVendedor(1);
        $data['Inmuebles'] = $citasModel->getInmuebles();
        $data['TipoInteresados'] = $citasModel->getTipoInteresadoEnum();


        if ($id == NULL) {
            // Settear los valores de default
            $data['fecha'] = date('Y-m-d\TH:i:s');
            $data['noCita'] = 1;
            $data['comentarios'] = "";

        } else {
            
            // Settear los valores de la BD
            $cita = $citasModel->getCitas($id);

            $data['fecha'] = date('Y-m-d\TH:i:s', strtotime($cita->Fecha));
            $data['noCita'] = $cita->NoCita;
            $data['comentarios'] = $cita->Comentarios;
        }

        // Cargar las vistas
        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('Citas/update', $data);
        $this->load->view('footer_app');
    }

    public function insertar() 
    {
        $citasModel = new CitasModel;
        $citasModel->insertarCita();
        redirect(base_url('index.php/citas/index'));
    }
}