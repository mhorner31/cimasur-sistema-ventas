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
}

?>