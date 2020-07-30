<?php

class Produk extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Mobil_model');
        $this->load->library('form_validation');        
    }
    
    public function index(){
        $data['judul'] = 'Menu Produk';

        $data['mobil'] = $this->Mobil_model->getAllMobil();
        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $data['judul'] = 'Form Tambah data pemesanan';

        $this->form_validation->set_rules('nama_mobil', 'Nama_mobil', 'required');
        $this->form_validation->set_rules('desc_mobil', 'Desc_mobil', 'required');
        $this->form_validation->set_rules('harga_mobil', 'Harga_mobil', 'required|numeric');


        if( $this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('produk/tambah');
        $this->load->view('templates/footer');
        }else{
            $this->Mobil_model->tambahDataMobil();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('produk');
        }
    }

}