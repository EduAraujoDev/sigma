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
        $this->load->model('DespesaGeral_model', 'despesageral_model');
        $this->load->model('DespesaCategoria_model', 'despesacategoria_model');
        $this->load->model('DespesaStatus_model', 'despesastatus_model');

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

    /* public function buscar() {
      $nome = (String) $this->input->get('busca');
      $despesageral = $this->despesageral_model->get_categoria_by_nome($nome)->result();
      $data = ['base_url' => $this->config->base_url(), 'despesageral' => $despesageral];
      $this->twig->display('despesageral/listar', $data);
      } */

    public function listar() {
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'despesageral' => $this->despesageral_model->get_despesageral_notDeleted()->result()];
        $this->twig->display('despesageral/listar', $data);
    }

    public function novo() {
        $data_atual = new DateTime();
        $data = ['base_url' => $this->config->base_url(),
            'despesageral' => $this->despesageral_model->get_despesageral_notDeleted()->result(),
            'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
            'data_atual' => $data_atual,
            'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
        $this->twig->display('despesageral/novo', $data);
    }

    public function adicionar() {
        $date = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_criacao'));
        $data_criacao = $date->format('Y-m-d');

        $date = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_vencimento'));
        $data_vencimento = $date->format('Y-m-d');

        $dados = array(
            'id_categoria' => $this->input->post('categoria'),
            'id_status' => 1,
            'data_criacao' => $data_criacao,
            'data_vencimento' => $data_vencimento,
            'total' => $this->input->post('valorTotal'),
            'observacoes' => $this->input->post('observacoes'),
        );
        try {
            $this->despesageral_model->insert_despesageral($dados);
            $this->session->set_flashdata('message_success', 'Despesa geral adicionada com sucesso!');
        } catch (Exception $exc) {
            $this->session->set_flashdata('message_success', $exc->getTraceAsString());
        }
        redirect('DespesaGeral/listar', 'refresh');
    }

    public function visualizar($despesageral_id) {
        if ($despesageral_id != NULL) {
            $despesageral_id = $despesageral_id;
        } else {
            $despesageral_id = $this->uri->segment(3);
        }
        if ($despesageral_id != NULL) {

            $data_atual = new DateTime();
            $data_atual = $data_atual->format("Y-m-d");
            $despesageral = $this->despesageral_model->get_despesageral_byid($despesageral_id)->row();
            $data_vencimento = $despesageral->data_vencimento;
            $data_vencimento = new DateTime($data_vencimento);
            $data_vencimento = $data_vencimento->format("Y-m-d");
            if ($data_atual > $data_vencimento) {
                $this->StatusAtrazado($despesageral_id);
            }

            $data = ['base_url' => $this->config->base_url(),
                'despesageral' => $this->despesageral_model->get_despesageral_byid($despesageral_id)->row(),
                'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
                'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];
            $this->twig->display('despesageral/visualizar', $data);
        } else {
            redirect('DespesaGeral/listar', 'refresh');
        }
    }

    public function editar($despesageral_id) {
        if ($despesageral_id != NULL) {
            $despesageral_id = $despesageral_id;
        } else {
            $despesageral_id = $this->uri->segment(3);
        }
        if ($despesageral_id != NULL) {

            $data_atual = new DateTime();
            $data_atual = $data_atual->format("Y-m-d");
            $despesageral = $this->despesageral_model->get_despesageral_byid($despesageral_id)->row();
            $data_vencimento = $despesageral->data_vencimento;
            $data_vencimento = new DateTime($data_vencimento);
            $data_vencimento = $data_vencimento->format("Y-m-d");
            if ($data_atual > $data_vencimento) {
                $this->StatusAtrazado($despesageral_id);
            }
            $data = ['base_url' => $this->config->base_url(),
                'despesageral' => $this->despesageral_model->get_despesageral_byid($despesageral_id)->row(),
                'status' => $this->despesastatus_model->get_despesastatus_notDeleted()->result(),
                'categorias' => $this->despesacategoria_model->get_despesacategoria_notDeleted()->result()];

            $this->twig->display('despesageral/editar', $data);
        } else {
            redirect('DespesaGeral/listar', 'refresh');
        }
    }

    public function finalizar() {
        $despesageral_id = $this->uri->segment(3);
        if ($despesageral_id != NULL) {
            $data_atual = new DateTime();
            $data_atual = $data_atual->format("Y-m-d");
            $dados = array(
                'data_pagamento' => $data_atual,
                'id_status' => 3,
                'finalizado' => 1
            );
            $this->despesageral_model->update_despesageral($dados, array('id_despesa' => $despesageral_id));
            $this->session->set_flashdata('message_success', 'Despesa geral finalizada com sucesso!');
        }
        redirect('DespesaGeral/listar', 'refresh');
    }

    public function atualizar() {
        $despesageral_id = $this->uri->segment(3);
        if ($despesageral_id != NULL) {
            $date = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_criacao'));
            $data_criacao = $date->format('Y-m-d');

            $date = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_vencimento'));
            $data_vencimento = $date->format('Y-m-d');

            $dados = array(
                'id_categoria' => $this->input->post('categoria'),
                'data_criacao' => $data_criacao,
                'data_vencimento' => $data_vencimento,
                'total' => $this->input->post('valorTotal'),
                'observacoes' => $this->input->post('observacoes')
            );
            $this->despesageral_model->update_despesageral($dados, array('id_despesa' => $despesageral_id));
            $this->session->set_flashdata('message_success', 'Despesa geral editada com sucesso!');
        }
        redirect('DespesaGeral/listar', 'refresh');
    }

    public function StatusAtrazado($despesageral_id) {
        $dados = array(
            'id_status' => 2
        );
        $this->despesageral_model->update_despesageral($dados, array('id_despesa' => $despesageral_id));
    }

    // Deleta a categoria selecionada na base de dados
    public function deletar() {
        $despesageral_id = $this->uri->segment(3);
        if ($despesageral_id != NULL) {
            // Deleta a categotia na base de dadps
            $this->despesageral_model->delete_logical_despesageral(array('id_despesa' => $despesageral_id));
            $this->session->set_flashdata('message_success', 'Despesa geral deletada com sucesso!');
        }
        redirect('DespesaGeral/listar', 'refresh');
    }

}
