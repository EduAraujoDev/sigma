<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class OrdemServico extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->model('OrdemServico_model', 'ordemservico_model');
        $this->load->model('OrdemServicoProduto_model', 'ordemservicoproduto_model');
        $this->load->model('OrdemServicoServico_model', 'ordemservicoservico_model');
        $this->load->model('OrdemServicoStatus_model', 'ordemservicostatus_model');

        $this->load->model('TipoPagamento_model', 'tipopagamento_model');
        $this->load->model('produto_model', 'produto_model');
        $this->load->model('cliente_model', 'cliente_model');
        $this->load->model('servico_model', 'servico_model');

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

    public function listar() {
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url'     => $this->config->base_url(),
            'message_success'   => $message_success,
            'ordemServicos'     => $this->ordemservico_model->get_ordemServico_notDeleted()->result(),
            'status'            => $this->ordemservicostatus_model->get_ordemServicoStatus_notDeleted()->result(),
            'tipoPagamentos'    => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
            'user'              => $user,
            'clientes'          => $this->cliente_model->get_cliente_notDeleted()->result()];
        $this->twig->display('ordemservico/listar', $data);
    }

    public function visualizar($ordemServico_id) {
        if ($ordemServico_id != NULL) {
            $ordemServico_id = $ordemServico_id;
        } else {
            $ordemServico_id = $this->uri->segment(3);
        }

        if ($ordemServico_id != NULL) {
            $message_success = $this->session->flashdata('message_success');
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'message_success'			=> $message_success,
                'ordemServico_cabecalho'	=> $this->ordemservico_model->get_ordemServico_byid($ordemServico_id)->row(),
                'ordemServico_produtos'    	=> $this->ordemservicoproduto_model->get_ordemServicoProduto_byid($ordemServico_id)->result(),
                'ordemServico_servicos'    	=> $this->ordemservicoservico_model->get_ordemServicoServico_byid($ordemServico_id)->result(),
                'status'                	=> $this->ordemservicostatus_model->get_ordemServicoStatus_notDeleted()->result(),
                'tipoPagamentos'        	=> $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
                'clientes'              	=> $this->cliente_model->get_cliente_notDeleted()->result(),
                'produtos'              	=> $this->produto_model->get_produto_notDeleted()->result(),
                'servicos'              	=> $this->servico_model->get_servico_notDeleted()->result(),                
                'user' => $user,
            ];
            $this->twig->display('ordemservico/visualizar', $data);
        } else {
            redirect('ordemservico/listar', 'refresh');
        }
    }    
}