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

        $inmuebles=new UsuariosModel;
        $data['inmuebles']=$inmuebles->getInmuebles($id);
        $data['tipoInmueble']=$inmuebles->getTipoInmueble();
        $data['dispInmueble']=$inmuebles->getDisponibilidadInmueble();


        if ($id == NULL) {
            // Settear los valores de default
            $data['id'] = 0;            
            $data['Nombre'] = "";
            $data['Tipo'] = 0;
            $data['Disponibilidad'] = 0;
            $data['Descripcion'] = "";
            $data['Precio'] = 0;

        } else {
            
            // Settear los valores de la BD
            $inmueble = $inmuebles->getInmuebles($id);

            $data['id'] = $id;
            $data['Nombre'] = $inmueble->Nombre;
            $data['Tipo'] = $inmueble->Tipo;
            $data['Precio'] = $inmueble->Precio;
            $data['Disponibilidad'] = $inmueble->Disponibilidad;
            $data['Descripcion'] = $inmueble->Descripcion;
        }

        $this->load->view('Inmuebles/update', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function delete($id)
    {
       $this->load->helper('url');
       $this->load->helper('html');
       
       $this->db->where('id', $id);
       $this->db->delete('Inmueble');
       redirect(base_url('/index.php/inmuebles/'));
   }

   public function postData($id)
   {
       if ($id == 0)
       {
           $this->addInmueble();
       } 
       else 
       {
           $this->updateInmueble($id);
       }
   }

   public function addInmueble()
   {
       $this->load->helper('url');
       $this->load->helper('html');

       $inmuebles=new UsuariosModel;
       $inmuebles->insertItem();
       redirect(base_url('/index.php/inmuebles/'));
    }

    public function updateInmueble($id) 
    {

        $this->load->helper('url');
        $this->load->helper('html');
        
        $inmuebles=new UsuariosModel;
        $inmuebles->udpateItem($id);
        redirect(base_url('/index.php/inmuebles/'));
    }
}
?>