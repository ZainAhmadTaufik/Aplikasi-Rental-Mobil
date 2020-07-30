<?php

class Data_pemesanan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Pemesanan_model');  
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data['judul'] = 'Form Tambah data pemesanan';

        $this->form_validation->set_rules('nama_customer', 'Nama_customer', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jumlah_mobil', 'Jumlah_mobil', 'required|numeric');
        $this->form_validation->set_rules('total_harga', 'Total_harga', 'required|numeric');


        if( $this->form_validation->run() == FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('data_pemesanan/index');
        $this->load->view('templates/footer');
        }else{
            $this->Pemesanan_model->tambahDatapemesanan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('data_pemesanan');
        }
    }
}