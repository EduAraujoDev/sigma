<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('usuario_model', 'usuario_model');

        if (isset($_SESSION['userLogin'])) {
            if (strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO') {
                redirect('/usuario', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }	
	}

	public function index()
	{
		$data = ['base_url' => $this->config->base_url()];
        $this->twig->display('usuario/dashboard_usuario', $data);		
	}

    public function listar() {
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'usuarios' => $this->usuario_model->get_usuario_notDeleted()->result()
        ];
        $this->twig->display('usuario/listar', $data);
    }	
}