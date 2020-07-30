<?php

class Mobil_model extends CI_model {
    public function getAllMobil(){
        return $query = $this->db->get('mobil')->result_array();
    }

    public function tambahDataMobil(){
        $data = [
            "nama_mobil" => $this->input->post('nama_mobil', true),
            "desc_mobil" => $this->input->post('desc_mobil', true),
            "harga_mobil" => $this->input->post('harga_mobil', true),        
        ];

        $this->db->insert('mobil', $data);
    }
}