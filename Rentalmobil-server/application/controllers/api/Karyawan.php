<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Karyawan extends REST_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model', 'karyawan');
    }

    //memanggil data
    public function index_get()
    {
        $id_karyawan = $this->get('id_karyawan');
        if ($id_karyawan === null) {
            $karyawan = $this->karyawan->getKaryawan();
        }else{
            $karyawan = $this->karyawan->getKaryawan($id_karyawan);
        }
        
        
        if ($karyawan) {
            $this->response([
                'status' => true,
                'data' => $karyawan
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'id_karyawan not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //menghapus data
    public function index_delete()
    {
        $id_karyawan = $this->delete('id_karyawan');

        if ($id_karyawan === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id_karyawan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if($this->karyawan->deleteKaryawan($id_karyawan) > 0){
                  //ok
                  $this->response([
                    'status' => true,
                    'id_karyawan' => $id_karyawan,
                    'message' => 'delete finish.'
                ], REST_Controller::HTTP_OK);
            }else {
                //id_karyawan not found
                $this->response([
                    'status' => false,
                    'message' => 'id karyawan not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $id_karyawan = $this->post('id_karyawan');
        $nama_karyawan = $this->post('nama_karyawan');
        $alamat_karyawan = $this->post('alamat_karyawan');
        $jk = $this->post('jk');
        $no_telp = $this->post('no_telp');

        $data = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'alamat_karyawan' => $alamat_karyawan,
            'jk' => $jk,
            'no_telp' => $no_telp
        ];

        if ($this->karyawan->createKaryawan($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new karyawan has been created.'
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
        $id_karyawan = $this->put('id_karyawan');
        if ($id_customer === null) {
            $this->response([
                'status' => false,
                'messages' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $data = [
            'nama_karyawan' => $this->put('nama_karyawan'),
            'alamat_karyawan' => $this->put('alamat_karyawan'),
            'jk' => $this->put('jk'),
            'no_telp' => $this->put('no_telp')
        ];

        if ($this->karyawan->updateKaryawan($data, $id_karyawan) > 0){
            $this->response([
                'status' => true,
                'message' => 'data new karyawan has been updated.'
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
