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

    public function getInmuebles(){
        $query = $this->db->query(
            "SELECT i.id, i.Nombre, i.Descripcion, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
             FROM Inmueble i
             INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
             INNER JOIN TipoInmueble t ON i.idTipo = t.id");
        return $query->result();
    }

    public function getInmueble($id){
        $query = $this->db->query(
            "SELECT i.id, i.Nombre, i.Descripcion, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
             FROM Inmueble i
             INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
             INNER JOIN TipoInmueble t ON i.idTipo = t.id 
             WHERE i.id = $id");
        return $query->result();
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
        
        return $this->db->update('Inmueble',$data);
               
    }

}

?>