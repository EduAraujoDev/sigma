<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DespesaCategoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DespesaCategoria_model', 'despesacategoria_model');

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
        $message_error = $this->session->flashdata('message_error');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'message_error' => $message_error,
            'user' => $user,
            'despesacategorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
        $this->twig->display('despescategoria/listar', $data);
    }

    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
            ];
        $this->twig->display('despescategoria/novo', $data);
    }

    public function adicionar() {
        if ($this->input->post('titulo') == '') {
            $this->session->set_flashdata('message_error', 'O campo titulo não pode esar vazio!');
            redirect('DespesaCategoria/listar', 'refresh');
        }

        $dados = array(
            'titulo' => $this->input->post('titulo')
        );
        try {
            $this->despesacategoria_model->set_despesacategoria($dados);
            $this->session->set_flashdata('message_success', 'Categoria Despesa geral adicionada com sucesso!');
        } catch (Exception $exc) {
            $this->session->set_flashdata('message_success', $exc->getTraceAsString());
        }
        redirect('DespesaCategoria/listar', 'refresh');
    }

    public function editar() {
        $categoria_id = $this->uri->segment(3);
        if ($categoria_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'despescategoria' => $this->despesacategoria_model->get_despesacategoria_byid($categoria_id)->row()];
            $this->twig->display('despescategoria/editar', $data);
        } else {
            redirect('DespesaCategoria/listar', 'refresh');
        }
    }

    public function atualizar() {
        if ($this->input->post('titulo') == '') {
            $this->session->set_flashdata('message_error', 'O campo titulo não pode esar vazio!');
            redirect('DespesaCategoria/listar', 'refresh');
        }
        $categoria_id = $this->uri->segment(3);
        if ($categoria_id != NULL) {
            $dados = array(
                'titulo' => $this->input->post('titulo')
            );
            $this->despesacategoria_model->update_despesacategoria($dados, array('id_categoria' => $categoria_id));
            $this->session->set_flashdata('message_success', 'Categoria  Despesa geral editada com sucesso!');
        }
        redirect('DespesaCategoria/listar', 'refresh');
    }

    public function deletar() {
        $categoria_id = $this->uri->segment(3);
        if ($categoria_id != NULL) {
            // Deleta a categotia na base de dadps
            $this->despesacategoria_model->delete_logical_despesacategoria(array('id_categoria' => $categoria_id));
            $this->session->set_flashdata('message_success', 'Categoria Despesa geral deletada com sucesso!');
        }
        redirect('DespesaCategoria/listar', 'refresh');
    }

}
