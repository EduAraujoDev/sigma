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

        $this->load->model('Orcamento_model', 'orcamento_model');
        $this->load->model('OrcamentoStatus_model', 'orcamentostatus_model');
        $this->load->model('OrcamentoServico_model', 'orcamentoservico_model');        
        $this->load->model('TipoPagamento_model', 'tipopagamento_model');

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
            'tipoPagamentos' => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
        ];
        $this->twig->display('orcamento/novo', $data);
    }

    public function adicionar() {
        $totalValorBruto = str_replace('.', '', $this->input->post('totalValorBruto'));
        $totalValorBruto = str_replace(',', '.', $totalValorBruto);

        $totalValorLiquido = str_replace('.', '', $this->input->post('totalValorLiquido'));
        $totalValorLiquido = str_replace(',', '.', $totalValorLiquido);

        $dadosCabec = array(
            'id_status'                 => $this->input->post('statusOrcamento'),
            'id_cliente'                => $this->input->post('codCliente'),
            'id_tipo_pagamento'         => $this->input->post('tipoPagamento'),
            'data_criacao'              => $this->input->post('dataCriacao'),
            'data_finalizacao'          => $this->input->post('dataFinalizacao'),
            'data_prevista_finalizacao' => $this->input->post('dataFinalizacao'),
            'desconto_adicional'        => $this->input->post('descontoAdicional'),
            'desconto_total'            => $this->input->post('descontoTotal'),
            'total_bruto'               => $totalValorBruto,
            'total_liquido'             => $totalValorLiquido,
            'observacoes'               => $this->input->post('observacoes'),
            'finalizado'                => 0,
            'deletado'                  => 0
        );
        
        $id = $this->orcamento_model->insert_orcamento($dadosCabec);

        $quantidadeServicos = $this->input->post('quantidadeServicos');
        for ($i=1; $i <= $quantidadeServicos; $i++) {
            $valorCobrado = str_replace('.', '', $this->input->post('servico_vlrCobrado_'.$i));
            $valorCobrado = str_replace(',', '.', $valorCobrado);            
            
            $dadosServico = array(

                'id_servico'    => $this->input->post('servico_codigo_'.$i),
                'id_orcamento'  => $id,
                'preco_cobrado' => $valorCobrado
            );

            $this->orcamentoservico_model->insert_orcamentoServico($dadosServico);
        }        

        $this->session->set_flashdata('message_success', 'Orçamento adicionado com sucesso!');
        redirect('orcamento/listar', 'refresh');
    }    
}