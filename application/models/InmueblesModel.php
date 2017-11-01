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
            "SELECT i.Nombre, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
             FROM Inmueble i
             INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
             INNER JOIN TipoInmueble t ON i.idTipo = t.id");
        return $query->result();
    }
}

?>