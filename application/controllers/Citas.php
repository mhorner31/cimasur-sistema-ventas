<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Citas extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('CitasModel');
            $this->load->helper('url_helper');
    }
     
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');

        $citasModel = new CitasModel;
        $data['data'] = $citasModel->getCitas();

        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('Citas/list', $data);
        $this->load->view('footer_app');
    }

    public function update($id = NULL) 
    {
        $this->load->helper('url');
        $this->load->helper('html');

        $citasModel = new CitasModel;
        $data['Clientes'] = $citasModel->getClientesPorVendedor(1);

        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('Citas/update', $data);
        $this->load->view('footer_app');
    }
}