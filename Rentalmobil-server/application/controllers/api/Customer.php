<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Customer extends REST_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model', 'customer');
    }

    //memanggil data
    public function index_get()
    {
        $id_customer = $this->get('id_customer');
        if ($id_customer === null) {
            $customer = $this->customer->getCustomer();
        }else{
            $customer = $this->customer->getCustomer($id_customer);
        }
        
        
        if ($customer) {
            $this->response([
                'status' => true,
                'data' => $customer
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //menghapus data
    public function index_delete()
    {
        $id_customer = $this->delete('id_customer');

        if ($id_customer === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if($this->customer->deleteCustomer($id_customer) > 0){
                  //ok
                  $this->response([
                    'status' => true,
                    'id_customer' => $id_customer,
                    'message' => 'delete finish.'
                ], REST_Controller::HTTP_OK);
            }else {
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id customer not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {   
        $id_customer = $this->post('id_customer');
        $nama_customer = $this->post('nama_customer');
        $alamat = $this->post('alamat');
        $jk = $this->post('jk');
        $no_telepon = $this->post('no_telepon');

        $data = [
            'id_customer' => $id_customer,
            'nama_customer' => $nama_customer,
            'alamat' => $alamat,
            'jk' => $jk,
            'no_telepon' => $no_telepon
        ];

        if ($this->customer->createCustomer($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new customer has been created.'
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
        $id_customer = $this->put('id_customer');

        if ($id_customer === null) {
            $this->response([
                'status' => false,
                'messages' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }


        $data = [
            'nama_customer' => $this->put('nama_customer'),
            'alamat' => $this->put('alamat'),
            'jk' => $this->put('jk'),
            'no_telepon' => $this->put('no_telepon')
        ];

        if ($this->custumer->updateCustomer($data, $id_customer) > 0){
            $this->response([
                'status' => true,
                'message' => 'data new customer has been updated.'
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
