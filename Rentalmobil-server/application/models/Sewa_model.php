<?php 

class Sewa_model extends CI_Model{
    public function getSewa($id_sewa = null)
    {
        if( $id_sewa === null){
            return $this->db->get('sewa')->result_array();
        }else{
            return $this->db->get_where('sewa', ['id' => $id_sewa])->result_array();
        }
    }

    public function deleteSewa($id_sewa)
    {
        $this->db->delete('sewa', ['id_sewa' => $id_sewa]);
        return $this->db->affected_rows();
    }

    public function createSewa($data)
    {
        $this->db->insert('sewa', $data);
        return $this->db->affected_rows();
    }

    public function updateSewa($data, $id_sewa)
    {
        $this->db->update('sewa', $data , ['id' => $id_sewa]);
        return $this->db->affected_rows();
    }
}
?>
