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
    
    public function buscar() {
        $nome = (String) $this->input->get('busca');
        $despesageral = $this->despesageral_model->get_categoria_by_nome($nome)->result();
        $data = ['base_url' => $this->config->base_url(),
            'despesageral' => $despesageral
        ];
        $this->twig->display('despesageral/listar', $data);
    }
    
    public function listar() {
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'despesageral' => $this->despesageral_model->get_categoria_notDeleted()->result()
        ];
        $this->twig->display('despesageral/listar', $data);
    }
    
    public function novo() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('despesageral/novo', $data);
    }
    
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioCategoria();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes da categoria
            $dados = array(
                'titulo' => $this->input->post('descricao'),
                'deletado' => 0
            );
            $this->despesageral_model->set_categoria($dados);
            $this->session->set_flashdata('message_success', 'Despesa geral adicionada com sucesso!');
            redirect('despesageral/listar', 'refresh');
        } else {
            redirect('despesageral/novo', 'refresh');
        }
    }
    
    public function visualizar($despesageral_id) {
        if ($despesageral_id != NULL) {
            $despesageral_id = $despesageral_id;
        } else {
            $despesageral_id = $this->uri->segment(3);
        }
        if ($despesageral_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'despesageral' => $this->despesageral_model->get_categoria_byid($despesageral_id)->row()];
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
                'despesageral' => $this->despesageral_model->get_categoria_byid($despesageral_id)->row()];
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
                    'titulo' => $this->input->post('descricao')
                );
                $this->despesageral_model->update_categoria($dados, array('id_despesageral' => $despesageral_id));
            }
        }
        $this->session->set_flashdata('message_success', 'Despesa geral editada com sucesso!');
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
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        return $this->form_validation;
    }
    
}
