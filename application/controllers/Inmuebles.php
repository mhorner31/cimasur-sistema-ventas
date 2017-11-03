<? if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
class Inmuebles extends CI_Controller
{
     
    /**
    * Get All Data from this method.
    *
    * @return Response
   */
    public function __construct()
    {
      //load database in autoload libraries
        parent::__construct();
        $this->load->model('InmueblesModel');
    }


    public function index()
    {
        $inmuebles=new InmueblesModel;
        $data['data']=$inmuebles->getInmuebles();

        $this->load->helper('url');
        $this->load->helper('html');

        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('inmuebles', $data);
        $this->load->view('footer_app');
    }

    public function create()
    {

        $inmuebles=new InmueblesModel;
        $data['tipoInmueble']=$inmuebles->getTipoInmueble();
        $data['dispInmueble']=$inmuebles->getDisponibilidadInmueble();

        $this->load->helper('url');
        $this->load->helper('html');

        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('inmuebles_add', $data);
        $this->load->view('footer_app');
    }

     /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       
       $this->load->helper('url');
       $this->load->helper('html');

       $this->load->view('header_app');
       $this->load->view('topbar_app');
       $this->load->view('sidebar_app');

       $inmuebles=new InmueblesModel;
       $data['data']=$inmuebles->getInmueble($id);
       
       $this->load->view('inmuebles_update', $data);
       $this->load->view('footer_app');
   }

   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $this->load->helper('url');
       $this->load->helper('html');
       
       $this->db->where('id', $id);
       $this->db->delete('Inmueble');
       redirect(base_url('/index.php/inmuebles/'));
   }

    /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function add()
   {
       $this->load->helper('url');
       $this->load->helper('html');

       $inmuebles=new InmueblesModel;
       $inmuebles->insertItem();
       redirect(base_url('/index.php/inmuebles/'));
    }

    public function udpate($id) 
    {
        $inmuebles=new InmueblesModel;
        $inmuebles->udpateItem($id);
        redirect(base_url('/index.php/inmuebles/'));
    }
}
?>