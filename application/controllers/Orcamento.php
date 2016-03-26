<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para a marca
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Orcamento extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('OrcamentoStatus_model', 'orcamentostatus_model');
        $this->load->model('Orcamento_model', 'orcamento_model');

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
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'orcamentos' => $this->orcamento_model->get_orcamento_notDeleted()->result()];
        $this->twig->display('orcamento/listar', $data);
    }    
    
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'status' => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
        ];
        $this->twig->display('orcamento/novo', $data);
    }
}