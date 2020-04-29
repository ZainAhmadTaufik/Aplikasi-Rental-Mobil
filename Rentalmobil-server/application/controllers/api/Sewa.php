<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Sewa extends REST_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sewa_model', 'sewa');
    }

    //memanggil data
    public function index_get()
    {
        $id_sewa = $this->get('id_sewa');
        if ($id_sewa === null) {
            $sewa = $this->sewa->getSewa();
        }else{
            $sewa = $this->sewa->getSewa($id_sewa);
        }
        
        
        if ($sewa) {
            $this->response([
                'status' => true,
                'data' => $sewa
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'id sewa not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //menghapus data
    public function index_delete()
    {
        $id_sewa = $this->delete('id_sewa');

        if ($id_sewa === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id sewa!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if($this->sewa->deleteSewa($id_sewa) > 0){
                  //ok
                  $this->response([
                    'status' => true,
                    'id_sewa' => $id_sewa,
                    'message' => 'delete finish.'
                ], REST_Controller::HTTP_OK);
            }else {
                //id_sewa not found
                $this->response([
                    'status' => false,
                    'message' => 'id sewa not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $id_sewa = $this->post('id_sewa');
        $id_mobil = $this->post('id_mobil');
        $id_karyawan = $this->post('id_karyawan');
        $id_customer = $this->post('id_customer');
        $tgl_sewa = date('Y-m-d');
        $tgl_kembali = date('Y-m-d');
        $total_bayar = $this->post('total_bayar');
        $denda = $this->post('denda');

        $data = [
            'id_sewa' => $id_sewa,
            'id_mobil' => $id_mobil,
            'id_karyawan' => $id_karyawan,
            'id_customer' => $id_customer,
            'tgl_sewa' => $tgl_sewa,
            'tgl_kembali' => $tgl_kembali,
            'total_bayar' => $total_bayar,
            'denda' => $denda
        ];

        if ($this->sewa->createSewa($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new sewa has been created.'
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
        $id_sewa = $this->put('id_sewa');

        if ($id === null) {
            $this->response([
                'status' => false,
                'messages' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $id_mobil = $this->put('id_mobil');
        $id_karyawan = $this->put('id_karyawan');
        $id_customer = $this->put('id_customer');
        $tgl_sewa = date('Y-m-d');
        $tgl_kembali = date('Y-m-d');
        $total_bayar = $this->put('total_bayar');
        $denda = $this->put('denda');

        $data = [
            'id_mobil' => $id_mobil,
            'id_karyawan' => $id_karyawan,
            'id_customer' => $id_customer,
            'tgl_sewa' => $tgl_sewa,
            'tgl_kembali' => $tgl_kembali,
            'total_bayar' => $total_bayar,
            'denda' => $denda
        ];

        if ($this->sewa->updateMahasiswa($data, $id_sewa) > 0){
            $this->response([
                'status' => true,
                'message' => 'data new sewa has been updated.'
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
