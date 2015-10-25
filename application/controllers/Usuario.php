<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(isset($_SESSION['userLogin'])){
            if(strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'ADMIN'){
                redirect('/admin', 'refresh');
            }
		} else {
			redirect('/','refresh');
		}		
	}

	public function index()
	{
		$data = ['base_url' => $this->config->base_url()];
        $this->twig->display('usuario/dashboard_usuario', $data);		
	}
}