<?

class InmueblesModel extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function getTipoInmueble()
    {
        $query = $this->db->get("TipoInmueble");
        return $query->result();
    }

    public function getDisponibilidadInmueble()
    {
        $query = $this->db->get("DispInmueble");
        return $query->result();        
    }

    public function getInmuebles($id = NULL){
        $sql = "SELECT i.id, i.Nombre, i.Descripcion, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
                  FROM Inmueble i
                  INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
                  INNER JOIN TipoInmueble t ON i.idTipo = t.id";
         
         if ($id == NULL)
         {
             $query = $this->db->query($sql);
             return $query->result();
         } else {
             $query = $this->db->query($sql . " WHERE i.id = ?", array($id));
             return $query->row();
         }

    }

    public function insertItem()
    {    
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'idTipo' => $this->input->post('tipo'),
            'Precio' => $this->input->post('precio'),
            'idDisponibilidad' => $this->input->post('disponibilidad'),
            'Descripcion' => $this->input->post('descripcion')

        );
        return $this->db->insert('Inmueble', $data);
    }

    public function udpateItem($id) 
    {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'idTipo' => $this->input->post('tipo'),
            'Precio' => $this->input->post('precio'),
            'idDisponibilidad' => $this->input->post('disponibilidad'),
            'Descripcion' => $this->input->post('descripcion')

        );
        $this->db->where('id', $id);        
        $this->db->update('Inmueble', $data);
        
    }
}

?>