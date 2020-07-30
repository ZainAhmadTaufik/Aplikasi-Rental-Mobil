<?php

class Pemesanan_model extends CI_model {
    public function getAllMobil(){
        return $query = $this->db->get('Data_pemesanan')->result_array();
    }

    public function tambahDatapemesanan(){
        $data = [
            "nama_customer" => $this->input->post('nama_customer', true),
            "email" => $this->input->post('nama_customer', true),
            "jumlah_mobil" => $this->input->post('jumlah_mobil', true),
            "total_harga" => $this->input->post('total_harga', true),
        ];

        $this->db->insert('data_pemesanan', $data);
    }
}