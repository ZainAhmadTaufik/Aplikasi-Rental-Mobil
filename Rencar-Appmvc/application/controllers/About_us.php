<?php

class About_us extends CI_Controller{
    public function index(){
        $data['judul'] = 'Halaman About Us';
        $this->load->view('templates/header', $data);
        $this->load->view('about_us/index');
        $this->load->view('templates/footer');
    }

}