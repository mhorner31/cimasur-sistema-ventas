<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Clientes_ejemplo extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('citas_model');
            $this->load->helper('url_helper');
    }
     
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');


        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('citas');
        $this->load->view('footer_app');
    }
}