<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Construccion extends CI_Controller {
     
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');

        $this->load->library('session');

        $data['nickname']=$this->session->userdata('nickname');
        $data['tipo']=$this->session->userdata('tipo');
        $data['nombre']=$this->session->userdata('nombre');
        $data['apellidos']=$this->session->userdata('apellidos');
        $data['email']=$this->session->userdata('email');

       // $data['first_name'] = $this->session->userdata('first_name');

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app', $data);
        $this->load->view('Plantilla/construccion_app', $data);
        $this->load->view('Plantilla/footer_app');
    }
}