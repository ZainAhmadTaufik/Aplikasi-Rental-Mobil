<?php 

class Karyawan_model extends CI_Model{
    public function getKaryawan($id_karyawan = null)
    {
        if( $id_karyawan === null){
            return $this->db->get('karyawan')->result_array();
        }else{
            return $this->db->get_where('karyawan', ['$id_karyawan' => $id_karyawan])->result_array();
        }
    }

    public function deleteKaryawan($id_karyawan)
    {
        $this->db->delete('karyawan', ['id_karyawan' => $id_karyawan]);
        return $this->db->affected_rows();
    }

    public function createKaryawan($data)
    {
        $this->db->insert('karyawan', $data);
        return $this->db->affected_rows();
    }

    public function updateKaryawan($data, $id_karyawan)
    {
        $this->db->update('karyawan', $data , ['$id_karyawan' => $id_karyawan]);
        return $this->db->affected_rows();
    }
}
?>
