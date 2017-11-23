<? if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
class Usuarios extends CI_Controller
{

    public function __construct()
    {
      //load database in autoload libraries
        parent::__construct();
        $this->load->model('UsuariosModel');
    }


    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }   

        $usuarios=new UsuariosModel;
        $data['data']=$usuarios->getUsuarios();

        

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Usuarios/list', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function update($id = NULL)
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }   

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');

        $usuarios=new UsuariosModel;
        $data['usuarios']=$usuarios->getUsuarios($id);
        $data['tipoUsuario']=$usuarios->getTipoUsuario();
        $data['estatusUsuario']=$usuarios->getEstatusUsuario();


        if ($id == NULL) {
            // Settear los valores de default
            $data['id'] = 0;            
            $data['Nickname'] = "";
            $data['Tipo'] = "";
            $data['Nombre'] = "";
            $data['Apellidos'] = "";
            $data['Email'] = "";
            $data['Estatus'] = "";
            $data['Password'] = "";
        } else {
            
            // Settear los valores de la BD
            $usuario = $usuarios->getUsuarios($id);

            $data['id'] = $id;            
            $data['Nickname'] = $usuario->nickname;
            $data['Tipo'] = $usuario->Tipo;
            $data['Nombre'] = $usuario->Nombre;
            $data['Apellidos'] = $usuario->Apellidos;
            $data['Email'] = $usuario->email;
            $data['Estatus'] = $usuario->Estatus;
            $data['Password'] = $usuario->password;
        }

        $this->load->view('Usuarios/update', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function delete($id)
    {
       $this->load->helper('url');
       $this->load->helper('html');
       
       $this->db->where('id', $id);
       $this->db->delete('Usuario');
       redirect(base_url('/usuarios/'));
   }

   public function cambiarEstatus($id=0, $status=0) 
   {
        $this->load->helper('url');
        $this->load->helper('html');

       $data = array(
           'StatusId' => $status
       );

       $this->db->where('id', $id);        
       $this->db->update('Usuario', $data);

       redirect(base_url('/usuarios/'));
   }  

   public function postData($id)
   {
       if ($id == 0)
       {
           $this->agregarUsuario();
       } 
       else 
       {
           $this->actualizarUsuario($id);
       }
   }

   public function agregarUsuario()
   {
       $this->load->helper('url');
       $this->load->helper('html');

       $usuarios=new UsuariosModel;
       $usuarios->insertarUsuario();
       redirect(base_url('/usuarios/'));
    }

    public function actualizarUsuario($id) 
    {

        $this->load->helper('url');
        $this->load->helper('html');
        
        $usuarios=new UsuariosModel;
        $usuarios->actualizarUsuario($id);
        redirect(base_url('/usuarios/'));
    }
}
?>