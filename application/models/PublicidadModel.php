<?

class PublicidadModel extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function getPublicidad()
    {
        $query = $this->db->get("ComoSeEntero");
        return $query->result();
    }

    public function insertItem()
    {    
        $data = array(
            'Descripcion' => $this->input->post('descripcion'),
        );
        return $this->db->insert('ComoSeEntero', $data);
    }

    public function udpateItem($id) 
    {
        $data = array(
            'Descripcion' => $this->input->post('descripcion')
        );
        $this->db->where('id', $id);        
        $this->db->update('ComoSeEntero', $data);
        
    }
}

?>