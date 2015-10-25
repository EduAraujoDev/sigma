<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('usuario_model','usuario_model');

		if(isset($_SESSION['userLogin'])){
            if(strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO'){
                redirect('/usuario', 'refresh');
            }
		} else {
			redirect('/','refresh');
		}
	}

	public function index()	
	{
		$data = ['base_url' => $this->config->base_url()];
        $this->twig->display('admin/dashboard_admin', $data);
	}
}