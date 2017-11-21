<? if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
class Publicidad extends CI_Controller
{

    public function __construct()
    {
      //load database in autoload libraries
        parent::__construct();
        $this->load->model('PublicidadModel');
    }


    public function index()
    {
        $publicidad=new PublicidadModel;
        $data['data']=$publicidad->getPublicidad();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } 

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Publicidad/list', $data);
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

        $publicidad=new PublicidadModel;
        $data['publicidad']=$publicidad->getPublicidad($id);

        if ($id == NULL) {
            // Settear los valores de default
            $data['id'] = 0;                        
            $data['Descripcion'] = "";
            
        } else {
            // Settear los valores de la BD
            $publicidad = $publicidad->getPublicidad($id);

            $data['id'] = $id;
            $data['Descripcion'] = $publicidad->Descripcion;
        }

        $this->load->view('Publicidad/update', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function delete($id)
    {
       $this->load->helper('url');
       $this->load->helper('html');
       
       $this->db->where('id', $id);
       $this->db->delete('ComoSeEntero');
       redirect(base_url('/publicidad/'));
   }

   public function postData($id)
   {
       if ($id == 0)
       {
           $this->addPublicidad();
       } 
       else 
       {
           $this->updatePublicidad($id);
       }
   }

   public function addPublicidad()
   {
       $this->load->helper('url');
       $this->load->helper('html');

       $publicidad=new PublicidadModel;
       $publicidad->insertItem();
       redirect(base_url('/publicidad/'));
    }

    public function updatePublicidad($id) 
    {

        $this->load->helper('url');
        $this->load->helper('html');
        
        $publicidad=new PublicidadModel;
        $publicidad->udpateItem($id);
        redirect(base_url('/publicidad/'));
    }
}
?>