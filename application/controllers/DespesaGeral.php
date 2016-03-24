<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Controller para a despesa geral
 *
 * @author Admin
 */
class DespesaGeral extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('despesageral_model', 'despesageral_model');
        $this->load->model('despesacategoria_model', 'despesacategoria_model');
        $this->load->model('despesastatus_model', 'despesastatus_model');
        
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
    
    /*public function buscar() {
        $nome = (String) $this->input->get('busca');
        $despesageral = $this->despesageral_model->get_categoria_by_nome($nome)->result();
        $data = ['base_url' => $this->config->base_url(), 'despesageral' => $despesageral];
        $this->twig->display('despesageral/listar', $data);
    }*/
    
    public function listar() {
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'despesageral' => $this->despesageral_model->get_despesageral_notDeleted()->result()];
        $this->twig->display('despesageral/listar', $data);
    }
    
    public function novo() {
        $data = ['base_url' => $this->config->base_url(),
            'despesageral' => $this->despesageral_model->get_despesageral_notDeleted()->result(),
            'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
            'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
        $this->twig->display('despesageral/novo', $data);
    }
    
    public function adicionar() {
        // Validacoes de campo do formulario
        
        //$validacao_formulario = $this->validarformularioCategoria();
        //if ($validacao_formulario->run() == TRUE) {
            //echo 'bu';
            //var_dump('a'); mostra a variavel e o tipo
            //die; para a execucao do codigo!
            
            // Monta um array com as informacoes da categoria
            $dados = array(
                'id_categoria' => $this->input->post('categoria'),
                'id_status' => $this->input->post('var'),
                'data_criacao' => $this->input->post('data_criacao'),
                'data_vencimento' => $this->input->post('data_vencimento'),
                'data_pagamento' => $this->input->post('data_pagamento'),
                'total' => $this->input->post('valorTotal'),
                'observacoes' => $this->input->post('observacoes'),
                'deletado' => 0
            );
            
            $this->despesageral_model->insert_despesageral($dados);
            $this->session->set_flashdata('message_success', 'Despesa geral adicionada com sucesso!');
            redirect('despesageral/listar', 'refresh');
        //} else {
            //redirect('despesageral/novo', 'refresh');
        //}
    }
    
    public function visualizar($despesageral_id) {
        if ($despesageral_id != NULL) {
            $despesageral_id = $despesageral_id;
        } else {
            $despesageral_id = $this->uri->segment(3);
        }
        if ($despesageral_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'despesageral' => $this->despesageral_model->get_despesageral_byid($despesageral_id)->row(),
                'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
                'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
            $this->twig->display('despesageral/visualizar', $data);
        } else {
            redirect('despesageral/listar', 'refresh');
        }
    }
    
    public function editar($despesageral_id) {
        if ($despesageral_id != NULL) {
            $despesageral_id = $despesageral_id;
        } else {
            $despesageral_id = $this->uri->segment(3);
        }
        if ($despesageral_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'despesageral' => $this->despesageral_model->get_despesageral_byid($despesageral_id)->row(),
                'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
                'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
            
            $this->twig->display('despesageral/editar', $data);
        } else {
            redirect('despesageral/listar', 'refresh');
        }
    }

    public function atualizar() {
        $despesageral_id = $this->uri->segment(3);
        if ($despesageral_id != NULL) {
            $validacao_formulario = $this->validarformularioCategoria();
            if ($validacao_formulario->run() == TRUE) {
                $dados = array(
                'id_categoria' => $this->input->post('categoria'),
                'id_status' => $this->input->post('status'),
                'data_criacao' => $this->input->post('data_criacao'),
                'data_vencimento' => $this->input->post('data_vencimento'),
                'data_pagamento' => $this->input->post('data_pagamento'),
                'total' => $this->input->post('valorTotal'),
                'observacoes' => $this->input->post('observacoes'),
                'deletado' => 0
            );
                $this->despesageral_model->update_categoria($dados, array('id_despesageral' => $despesageral_id));
                $this->session->set_flashdata('message_success', 'Despesa geral editada com sucesso!');
            }
        }
        redirect('despesageral/listar', 'refresh');
    }

    // Deleta a categoria selecionada na base de dados
    public function deletar() {
        $despesageral_id = $this->uri->segment(3);
        if ($despesageral_id != NULL) {
            // Deleta a categotia na base de dadps
            //$this->categoria_model->delete_categoria(array('id_Categoria' => $categoria_id));
            $this->despesageral_model->delete_logical_categoria(array('id_despesageral' => $despesageral_id));
            $this->session->set_flashdata('message_success', 'Despesa geral deletada com sucesso!');
        }
        redirect('categoria/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioCategoria() {
        $this->form_validation->set_rules('id_categoria', 'id_categoria', 'required|is_natural');
        $this->form_validation->set_rules('id_status', 'id_status', 'required|is_natural');
        $this->form_validation->set_rules('data_criacao', 'data_criacao', 'required');
        $this->form_validation->set_rules('total', 'total', 'required');
        return $this->form_validation;
    }
    
}
