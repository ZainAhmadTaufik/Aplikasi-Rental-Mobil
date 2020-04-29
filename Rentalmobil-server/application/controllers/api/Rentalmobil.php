<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Rentalmobil extends REST_Controller
{
    public function index_get()
    {
        $this->response([
            'status' => true,
            'messages' => 'this API from  rental mobil!'
        ], REST_Controller::HTTP_OK);
    }
}
