<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Twig');
    }

      public function index() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('dashboard', $data);
    }

}
