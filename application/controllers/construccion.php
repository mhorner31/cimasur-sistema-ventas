<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Construccion extends CI_Controller {
     
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');


        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Plantilla/construccion_app');
        $this->load->view('Plantilla/footer_app');
    }
}