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
            
        } else {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        reduirect('/admin', 'refresh');
    }

    public function buscar() {
        $user = $_SESSION['userLogin'];
        $busca = (String) $this->input->get('busca');
        $tipo_busca = (String) $this->input->get('tipo_busca');
        $fornecedores = $this->fornecedor_model->get_fornecedor_notDeleted()->result();

        if ($tipo_busca == "nome") {
            $clientes = $this->fornecedor_model->get_fornecedor_by_nome($busca)->result();
        }

        if ($tipo_busca == "nome_fantasia") {
            $clientes = $this->fornecedor_model->get_fornecedor_by_nome_fantasia($busca)->result();
        }
        if ($tipo_busca == "cpf") {
            $clientes = $this->fornecedor_model->get_fornecedor_by_cpf_cnpj($busca)->result();
        }

        $data = array(
            'base_url' => $this->config->base_url(),
            'fornecedores' => $fornecedores,
            'user' => $user,
        );
        $this->twig->display('fornecedor/listar', $data);
    }

    // Pagina que lista os fornecedores
    public function listar() {
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'user' => $user,
            'fornecedores' => $this->fornecedor_model->get_fornecedor_notDeleted()->result()
        ];

        $this->twig->display('fornecedor/listar', $data);
    }

    // Pagina com o formulario para inclusao de novo fornecedor
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
            'UFS' => array('SP', 'RJ')];

        $this->twig->display('fornecedor/novo', $data);
    }

    //Adicona novo fornecedor
    public function adicionar() {
        // Validacoes de campo do formulario
        //echo 'chegou aqui.';
        
        //$validacao_formulario = $this->validarformularioFornecedor();
        //if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes do fornecedor
            //echo '2 chegou aqui.';    
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
                'deletado' => 0,
                'observacoes' => $this->input->post('obs')
            );

            $this->fornecedor_model->set_fornecedor($dados);
            $this->session->set_flashdata('message_success', 'Fornecedor adicionado com sucesso!');
            redirect('fornecedor/listar', 'refresh');
        //} else {
            //$this->session->set_flashdata('message_success', 'Houve erros!');
            //redirect('fornecedor/novo', 'refresh');
        //}
    }

    public function visualizar($fornecedor_id) {
        if ($fornecedor_id != NULL) {
            $fornecedor_id = $fornecedor_id;
        } else {
            $fornecedor_id = $this->uri->segment(3);
        }

        if ($fornecedor_id != null) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'user' => $user,
                'fornecedor' => $this->fornecedor_model->get_fornecedor_byid($fornecedor_id)->row()];
            $this->twig->display('fornecedor/visualizar', $data);
        } else {
            redirect('fornecedor/listar', 'refresh');
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
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'user' => $user,
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
                $this->session->set_flashdata('message_success', 'Fornecedor atulizado com sucesso!');
            }
        }
        redirect('fornecedor/listar', 'refresh');
    }

    // Deleta o fornecedor selecionado na base de dados
    public function deletar() {
        $fornecedor_id = $this->uri->segment(3);
        if ($fornecedor_id != null) {
            //$this->fornecedor_model->delete_fornecedor(array('id_fornecedor' => $fornecedor_id));
            $this->fornecedor_model->delete_logical_fornecedor(array('id_fornecedor' => $fornecedor_id));
            $this->session->set_flashdata('message_success', 'Fornecedor removido com sucesso!');
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
