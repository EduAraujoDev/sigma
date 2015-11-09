<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para o fornecedor
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Fornecedor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fornecedor_model', 'fornecedor_model');
        if (isset($_SESSION['userLogin'])) {
            if (strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO') {
                redirect('/usuario', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        reduirect('/admin', 'refresh');
    }

    // Pagina que lista os fornecedores
    public function listar() {
        $data = ['base_url' => $this->config->base_url(),
            'fornecedores' => $this->fornecedor_model->get_fornecedor_all()->result()];

        $this->twig->display('fornecedor/listar', $data);
    }

    // Pagina com o formulario para inclusao de novo fornecedor
    public function novo() {
        $data = ['base_url' => $this->config->base_url(),
            'UFS' => array('SP', 'RJ')];

        $this->twig->display('fornecedor/novo', $data);
    }

    //Adicona novo fornecedor
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioFornecedor();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes do fornecedor
            $dados = array(
                'nome' => $this->input->post('nome'),
                'nome_fantasia' => $this->input->post('nomeFantasia'),
                'cpf_cnpj' => $this->input->post('cnpj'),
                'ierg' => $this->input->post('ie'),
                'data_fundacao' => $this->input->post('dataFundacao'),
                'logradouro' => $this->input->post('logradouro'),
                'numero' => $this->input->post('numero'),
                'complemento' => $this->input->post('complemento'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'uf' => $this->input->post('uf'),
                'cep' => $this->input->post('cep'),
                'telefone_fixo' => $this->input->post('telFixo'),
                'celular' => $this->input->post('telCel'),
                'email' => $this->input->post('email'),
                'observacoes' => $this->input->post('obs')
            );

            $this->fornecedor_model->set_fornecedor($dados);
            redirect('fornecedor/listar', 'refresh');
        } else {
            redirect('fornecedor/novo', 'refresh');
        }
    }

    // Pagina com o formulario para alterar o fornecedor selecionado
    public function editar($fornecedor_id) {
        if ($fornecedor_id != NULL) {
            $fornecedor_id = $fornecedor_id;
        } else {
            $fornecedor_id = $this->uri->segment(3);
        }

        if ($fornecedor_id != null) {
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'fornecedor' => $this->fornecedor_model->get_fornecedor_byid($fornecedor_id)->row()];
            $this->twig->display('fornecedor/editar', $data);
        } else {
            redirect('fornecedor/listar', 'refresh');
        }
    }

    //Atualiza o fonecedor na base de dados
    public function atualizar() {
        $fornecedor_id = $this->uri->segment(3);
        if ($fornecedor_id != NULL) {
            // Validacoes de campo do formulario
            $validacao_formulario = $this->validarformularioFornecedor();
            if ($validacao_formulario->run() == TRUE) {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'nome_fantasia' => $this->input->post('nomeFantasia'),
                    'cpf_cnpj' => $this->input->post('cnpj'),
                    'ierg' => $this->input->post('ie'),
                    'data_fundacao' => $this->input->post('dataFundacao'),
                    'logradouro' => $this->input->post('logradouro'),
                    'numero' => $this->input->post('numero'),
                    'complemento' => $this->input->post('complemento'),
                    'bairro' => $this->input->post('bairro'),
                    'cidade' => $this->input->post('cidade'),
                    'uf' => $this->input->post('uf'),
                    'cep' => $this->input->post('cep'),
                    'telefone_fixo' => $this->input->post('telFixo'),
                    'celular' => $this->input->post('telCel'),
                    'email' => $this->input->post('email'),
                    'observacoes' => $this->input->post('obs')
                );

                $this->fornecedor_model->update_fornecedor($dados, array('id_fornecedor' => $fornecedor_id));
            }
        }
        $this->editar($fornecedor_id);
    }

    // Deleta o fornecedor selecionado na base de dados
    public function deletar() {
        $fornecedor_id = $this->uri->segment(3);
        if ($fornecedor_id != null) {
            $this->fornecedor_model->delete_fornecedor(array('id_fornecedor' => $fornecedor_id));
        }
        redirect('fornecedor/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioFornecedor() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        return $this->form_validation;
    }

}
