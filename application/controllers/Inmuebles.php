<? if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
class Inmuebles extends CI_Controller
{

    public function __construct()
    {
      //load database in autoload libraries
        parent::__construct();
        $this->load->model('InmueblesModel');
    }


    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }   

        $inmuebles=new InmueblesModel;
        $data['data']=$inmuebles->getInmuebles();

        

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Inmuebles/list', $data);
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

        $inmuebles=new InmueblesModel;
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
       redirect(base_url('/inmuebles/'));
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

       $inmuebles=new InmueblesModel;
       $inmuebles->insertItem();
       redirect(base_url('/inmuebles/'));
    }

    public function updateInmueble($id) 
    {

        $this->load->helper('url');
        $this->load->helper('html');
        
        $inmuebles=new InmueblesModel;
        $inmuebles->udpateItem($id);
        redirect(base_url('/inmuebles/'));
    }
}
?>