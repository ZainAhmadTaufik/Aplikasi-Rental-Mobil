<?php 

class Mobil_model extends CI_Model{
    public function getMobil($id_mobil = null)
    {
        if( $id_mobil === null){
            return $this->db->get('mobil')->result_array();
        }else{
            return $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->result_array();
        }
    }

    public function deleteMobil($id_mobil)
    {
        $this->db->delete('mobil', ['id_mobil' => $id_mobil]);
        return $this->db->affected_rows();
    }

    public function createMobil($data)
    {
        $this->db->insert('mobil', $data);
        return $this->db->affected_rows();
    }

    public function updateMobil($data, $id_mobil)
    {
        $this->db->update('mobil', $data , ['id_mobil' => $id_mobil]);
        return $this->db->affected_rows();
    }
}
?>
