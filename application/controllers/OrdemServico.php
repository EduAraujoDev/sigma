<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServico extends CI_Controller {

	public function index(){
		if (isset($_SESSION['userLogin'])) {
            if (strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO') {
                redirect('/usuario', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }
	}

	public function index() {
        redirect('/admin', 'refresh');
    }	
}