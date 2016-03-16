<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para o cliente
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cliente_model', 'cliente_model');
        if (isset($_SESSION['userLogin'])) {
            
        } else {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        redirect('/admin', 'refresh');
    }

    public function buscar() {
        $user = $_SESSION['userLogin'];
        $busca = (String) $this->input->get('busca');
        $tipo_busca = (String) $this->input->get('tipo_busca');
        $clientes = $this->cliente_model->get_cliente_notDeleted()->result();
        if ($tipo_busca == "nome") {
            $clientes = $this->cliente_model->get_cliente_by_nome($busca)->result();
        }
        if ($tipo_busca == "cpf") {
            $clientes = $this->cliente_model->get_cliente_by_cpf_cnpj($busca)->result();
        }

        $data = array(
            'base_url' => $this->config->base_url(),
            'clientes' => $clientes,
            'user' => $user,
        );
        $this->twig->display('cliente/listar', $data);
    }

    // Pagina que lista os clientes
    public function listar() {
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $clientes = $this->cliente_model->get_cliente_notDeleted()->result();
        $data = array(
            'base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'clientes' => $clientes,
            'user' => $user,
        );
        $this->twig->display('cliente/listar', $data);
    }

    // Formulario que adiciona novo cliente
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = array(
            'base_url' => $this->config->base_url(),
            'user' => $user,
        );
        $this->twig->display('cliente/novo', $data);
    }

    //Adicona novo cliente
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioCliente();

        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes do usuario
            $cliente = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'cpf_cnpj' => $this->input->post('cpf_cnpj'),
                'data_nascimento' => $this->input->post('data_nascimento'),
                'cep' => $this->input->post('cep'),
                'logradouro' => $this->input->post('logradouro'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'uf' => $this->input->post('uf'),
                'complemento' => $this->input->post('complemento'),
                'telefone_residencial' => $this->input->post('telefone_residencial'),
                'celular' => $this->input->post('celular'),
                'deletado' => 0,
                'observacoes' => $this->input->post('observacoes')
            );

            // Adicionar as informacoes do usuario
            $this->cliente_model->insert_cliente($cliente);
            $this->session->set_flashdata('message_success', 'Cliente adicionado com sucesso!');
            redirect('cliente/listar', 'refresh');
        } else {
            redirect('cliente/novo', 'refresh');
        }
    }

    public function visualizar($cliente_id) {
        if ($cliente_id != NULL) {
            $id_cliente = $cliente_id;
        } else {
            $id_cliente = $this->uri->segment(3);
        }
        if ($id_cliente != null) {
            $user = $_SESSION['userLogin'];
            $cliente = $this->cliente_model->get_cliente_by_id($id_cliente)->row();
            $data = ['base_url' => $this->config->base_url(),
                'user' => $user,
                'cliente' => $cliente];

            $this->twig->display('cliente/visualizar', $data);
        } else {
            redirect('cliente/listar', 'refresh');
        }
    }

    public function editar($cliente_id) {
        if ($cliente_id != NULL) {
            $id_cliente = $cliente_id;
        } else {
            $id_cliente = $this->uri->segment(3);
        }
        if ($id_cliente != null) {
            $user = $_SESSION['userLogin'];
            $cliente = $this->cliente_model->get_cliente_by_id($id_cliente)->row();
            $data = ['base_url' => $this->config->base_url(),
                'user' => $user,
                'cliente' => $cliente];

            $this->twig->display('cliente/editar', $data);
        } else {
            redirect('cliente/listar', 'refresh');
        }
    }

    public function atualizar() {
        $id_cliente = $this->uri->segment(3);
        if ($id_cliente != null) {
            // Validacoes de campo do formulario
            $validacao_formulario = $this->validarformularioCliente();
            if ($validacao_formulario->run() == TRUE) {
                // Monta um array com as informacoes do usuario
                $cliente = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'cpf_cnpj' => $this->input->post('cpf_cnpj'),
                    'data_nascimento' => $this->input->post('data_nascimento'),
                    'cep' => $this->input->post('cep'),
                    'logradouro' => $this->input->post('logradouro'),
                    'numero' => $this->input->post('numero'),
                    'bairro' => $this->input->post('bairro'),
                    'cidade' => $this->input->post('cidade'),
                    'uf' => $this->input->post('uf'),
                    'complemento' => $this->input->post('complemento'),
                    'telefone_residencial' => $this->input->post('telefone_residencial'),
                    'celular' => $this->input->post('celular'),
                    'observacoes' => $this->input->post('observacoes')
                );

                // Altera as informacoes do usuario
                $this->cliente_model->update_cliente($cliente, $id_cliente);
            }
        }
        $this->session->set_flashdata('message_success', 'Cliente editado com sucesso!');
        $this->editar($id_cliente);
    }

    // Deleta o cliente selecionado na base de dados
    public function deletar() {
        $id_cliente = $this->uri->segment(3);
        if ($id_cliente != null) {
            //$this->cliente_model->delete_cliente($id_cliente);
            $this->cliente_model->delete_logical_cliente(array('id_cliente' => $id_cliente));
            $this->session->set_flashdata('message_success', 'Cliente removido com sucesso!');
        }
        redirect('cliente/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioCliente() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('celular', 'celular', 'required');
        return $this->form_validation;
    }

    public function ajax_cliente() {
        $clientes = $this->cliente_model->get_cliente_notDeleted()->result();
        $data = array();

        foreach ($clientes as $cliente) {
            $linha = array();
            $linha[] = $cliente->id_cliente;
            $linha[] = $cliente->nome;
            $linha[] = $cliente->cpf_cnpj;
            $linha[] = $cliente->email;

            $data[] = $linha;
        }

        $saida = array("data" => $data,);

        echo json_encode($saida);
    }

}
