<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Mobil extends REST_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobil_model', 'mobil');
    }

    //memanggil data
    public function index_get()
    {
        $id_mobil = $this->get('id_mobil');
        if ($id_mobil === null) {
            $mobil = $this->mobil->getMobil();
        }else{
            $mobil = $this->mobil->getMobil($id_mobil);
        }
        
        
        if ($mobil) {
            $this->response([
                'status' => true,
                'data' => $mobil
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'id mobil not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //menghapus data
    public function index_delete()
    {
        $id_mobil = $this->delete('id_mobil');

        if ($id_mobil === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id mobil!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if($this->mobil->deleteMobil($id_mobil) > 0){
                  //ok
                  $this->response([
                    'status' => true,
                    'id_mobil' => $id_mobil,
                    'message' => 'delete finish.'
                ], REST_Controller::HTTP_OK);
            }else {
                //id_mobil not found
                $this->response([
                    'status' => false,
                    'message' => 'id mobil not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {   
        $id_mobil = $this->post('id_mobil');
        $no_plat = $this->post('no_plat');
        $jenis = $this->post('jenis');
        $merk = $this->post('merk');
        $tahun_buat = $this->post('tahun_buat');
        $warna = $this->post('warna');
        $harga_sewa = $this->post('harga_sewa');

        $data = [
            'id_mobil' => $id_mobil,
            'no_plat' => $no_plat,
            'jenis' => $jenis,
            'merk' => $merk,
            'tahun_buat' => $tahun_buat,
            'warna' => $warna,
            'harga_sewa' => $harga_sewa
        ];

        if ($this->mobil->createMobil($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new mobil has been created.'
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_mobil = $this->put('id_mobil');
        if ($id_customer === null) {
            $this->response([
                'status' => false,
                'messages' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $data = [
            'no_plat' => $this->put('no_plat'),
            'jenis' => $this->put('jenis'),
            'merk' => $this->put('merk'),
            'tahun_bulat' => $this->put('tahun_bulat'),
            'warna' => $this->put('warna'),
            'harga_sewa' => $this->put('harga_sewa')
        ];

        if ($this->mobil->updateMobil($data, $id_mobil) > 0){
            $this->response([
                'status' => true,
                'message' => 'data new mobil has been updated.'
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'failed to update new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
?>
