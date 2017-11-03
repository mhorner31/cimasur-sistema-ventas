<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        
        //librerias
        $this->load->library('form_validation');
        $this->load->library('session');

        //modelos   
        $this->load->model('LoginAppModel');

        //helpers
        $this->load->helper('form');
        $this->load->helper('url_helper');
        $this->load->helper('html');
    }
     
    public function index() 
    {
        //TODO: verificar si hay que volver a cargar los helpers
        $this->load->helper('url');
        $this->load->helper('html');

        if($this->session->userdata('nickname')){
            redirect('construccion');
        }else{
            $data['mensajeLogin'] = "";
            $this->load->view('login_app', $data);
        }
    }

    public function iniciarSesion() 
    {
        
        /*$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                redirect('construccion');
            }else{
                $this->load->view('login_app');
            }
        } else {*/
            $nickname = $_POST['nickname'];
            if ($this->LoginAppModel->login($nickname, md5($_POST['password']))) {
        
                //$username = $this->input->post('nickname');
                $result = $this->LoginAppModel->informacion_usuario($nickname);
                if ($result != false) {
                    $session_data = array(
                        'nickname' => $result[0]->nickname,
                        'tipo' => $result[0]->idTipoUsuario,
                        'nombre' => $result[0]->Nombre,
                        'apellidos' => $result[0]->Apellidos,
                        'email' => $result[0]->email,
                        );
                    // Add user data in session
                    $this->session->set_userdata($session_data);
                    redirect('construccion');
                //}
                } else {
                
                }
            } else {
                $data['mensajeLogin'] = "Usuario o contraseña incorrectos";
                $this->load->view('login_app', $data);
            }
    }

    public function cerrarSesion(){
        $sess_array = array('nickname' => '');
        $this->session->unset_userdata($sess_array);
        $data['mensajeLogin'] = 'Session terminada correctamente';
        $this->load->view('login_app', $data);
    }
}