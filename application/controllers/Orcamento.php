<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para a Orçamento
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
        $this->load->model('OrcamentoProduto_model', 'orcamentoproduto_model');
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
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url'     => $this->config->base_url(),
            'message_success'   => $message_success,
            'orcamentos'        => $this->orcamento_model->get_orcamento_notDeleted()->result(),
            'status'            => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
            'tipoPagamentos'    => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
            'clientes'          => $this->cliente_model->get_cliente_notDeleted()->result()];
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
        $validacao_formulario = $this->validarformularioOrcamento();

        if ($validacao_formulario->run() == TRUE) {
            $totalValorBruto = str_replace('.', '', $this->input->post('totalValorBruto'));
            $totalValorBruto = str_replace(',', '.', $totalValorBruto);

            $totalValorLiquido = str_replace('.', '', $this->input->post('totalValorLiquido'));
            $totalValorLiquido = str_replace(',', '.', $totalValorLiquido);

            $dataCriacao = $this->input->post('dataCriacao');
            $dataCriacao = substr($dataCriacao, 6, 4)."-".substr($dataCriacao, 3, 2)."-".substr($dataCriacao, 0, 2);

            $dataFinalizacao = $this->input->post('dataFinalizacao');
            $dataFinalizacao = substr($dataFinalizacao, 6, 4)."-".substr($dataFinalizacao, 3, 2)."-".substr($dataFinalizacao, 0, 2);

            $dadosCabec = array(
                'id_status'                 => $this->input->post('statusOrcamento'),
                'id_cliente'                => $this->input->post('codCliente'),
                'id_tipo_pagamento'         => $this->input->post('tipoPagamento'),
                'data_criacao'              => $dataCriacao,
                'data_prevista_finalizacao' => $dataFinalizacao,
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

            $quantidadeProdutos = $this->input->post('quantidadeProdutos');
            for ($i=1; $i <= $quantidadeProdutos; $i++) {
                $valorVenda = str_replace('.', '', $this->input->post('produto_prcProduto_'.$i));
                $valorVenda = str_replace(',', '.', $valorCobrado); 

                $valorCobrado = str_replace('.', '', $this->input->post('produto_prcCobrado_'.$i));
                $valorCobrado = str_replace(',', '.', $valorCobrado);            
                
                $desconto   = str_replace('%', '', $this->input->post('produto_desconto_'.$i));
                $idProduto  = $this->input->post('produto_codigo_'.$i);

                $quantProd = $this->input->post('produto_quantidade_'.$i);
                
                $dadosProduto = array(

                    'id_produto'    => $idProduto,
                    'id_orcamento'  => $id,
                    'quantidade'    => $quantProd,
                    'desconto'      => $desconto,
                    'preco_venda'   => $valorVenda,
                    'preco_cobrado' => $valorCobrado
                );

                $this->orcamentoproduto_model->insert_orcamentoProduto($dadosProduto);
                $this->atuEstProdutoOrcamento($idProduto, $quantProd, "NEW");
            }

            $this->session->set_flashdata('message_success', 'Orçamento adicionado com sucesso!');
            redirect('orcamento/listar', 'refresh');
        } else {
            redirect('orcamento/novo', 'refresh');
        }
    }

    public function visualizar($orcamento_id) {
        if ($orcamento_id != NULL) {
            $orcamento_id = $orcamento_id;
        } else {
            $orcamento_id = $this->uri->segment(3);
        }

        if ($orcamento_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'orcamento_cabecalho'   => $this->orcamento_model->get_orcamento_byid($orcamento_id)->row(),
                'orcamento_produtos'    => $this->orcamentoproduto_model->get_orcamentoProduto_byid($orcamento_id)->result(),
                'orcamento_servicos'    => $this->orcamentoservico_model->get_orcamentoServico_byid($orcamento_id)->result(),
                'status'                => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
                'tipoPagamentos'        => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
                'clientes'              => $this->cliente_model->get_cliente_notDeleted()->result(),
                'produtos'              => $this->produto_model->get_produto_notDeleted()->result(),
                'servicos'              => $this->servico_model->get_servico_notDeleted()->result(),                
                'user' => $user,
            ];
            $this->twig->display('orcamento/visualizar', $data);
        } else {
            redirect('orcamento/listar', 'refresh');
        }
    }

    public function editar($orcamento_id) {
        if ($orcamento_id != NULL) {
            $orcamento_id = $orcamento_id;
        } else {
            $orcamento_id = $this->uri->segment(3);
        }

        if ($orcamento_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'orcamento_cabecalho'   => $this->orcamento_model->get_orcamento_byid($orcamento_id)->row(),
                'orcamento_produtos'    => $this->orcamentoproduto_model->get_orcamentoProduto_byid($orcamento_id)->result(),
                'orcamento_servicos'    => $this->orcamentoservico_model->get_orcamentoServico_byid($orcamento_id)->result(),
                'status'                => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
                'tipoPagamentos'        => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
                'clientes'              => $this->cliente_model->get_cliente_notDeleted()->result(),
                'produtos'              => $this->produto_model->get_produto_notDeleted()->result(),
                'servicos'              => $this->servico_model->get_servico_notDeleted()->result(),
                'user' => $user,
            ];
            $this->twig->display('orcamento/editar', $data);
        } else {
            redirect('orcamento/listar', 'refresh');
        }
    }

    public function atualizar() {
        $idOrcamento = $this->uri->segment(3);

        if ($idOrcamento != NULL) {
            $totalValorBruto = str_replace('.', '', $this->input->post('totalValorBruto'));
            $totalValorBruto = str_replace(',', '.', $totalValorBruto);

            $totalValorLiquido = str_replace('.', '', $this->input->post('totalValorLiquido'));
            $totalValorLiquido = str_replace(',', '.', $totalValorLiquido);

            $dataCriacao = $this->input->post('dataCriacao');
            $dataCriacao = substr($dataCriacao, 6, 4)."-".substr($dataCriacao, 3, 2)."-".substr($dataCriacao, 0, 2);

            $dataFinalizacao = $this->input->post('dataFinalizacao');
            $dataFinalizacao = substr($dataFinalizacao, 6, 4)."-".substr($dataFinalizacao, 3, 2)."-".substr($dataFinalizacao, 0, 2);

            $dadosCabec = array(
                'id_orcamento'              => $idOrcamento,
                'id_status'                 => $this->input->post('statusOrcamento'),
                'id_cliente'                => $this->input->post('codCliente'),
                'id_tipo_pagamento'         => $this->input->post('tipoPagamento'),
                'data_criacao'              => $dataCriacao,
                'data_prevista_finalizacao' => $dataFinalizacao,
                'desconto_adicional'        => $this->input->post('descontoAdicional'),
                'desconto_total'            => $this->input->post('descontoTotal'),
                'total_bruto'               => $totalValorBruto,
                'total_liquido'             => $totalValorLiquido,
                'observacoes'               => $this->input->post('observacoes'),
                'finalizado'                => 0,
                'deletado'                  => 0
            );

            $this->orcamento_model->update_orcamento($dadosCabec, array('id_orcamento' => $idOrcamento));
            
            $this->orcamentoservico_model->delete_orcamentoServico(array('id_orcamento' => $idOrcamento));
            $quantidadeServicos = $this->input->post('quantidadeServicos');
            for ($i=1; $i <= $quantidadeServicos; $i++) {
                $valorCobrado = str_replace('.', '', $this->input->post('servico_vlrCobrado_'.$i));
                $valorCobrado = str_replace(',', '.', $valorCobrado);            
                
                $dadosServico = array(
                    'id_servico'    => $this->input->post('servico_codigo_'.$i),
                    'id_orcamento'  => $idOrcamento,
                    'preco_cobrado' => $valorCobrado
                );

                $this->orcamentoservico_model->insert_orcamentoServico($dadosServico);
            }

            $produtosOrcamento = $this->orcamentoproduto_model->get_orcamentoProduto_byid($idOrcamento)->result();

            foreach ($produtosOrcamento as $produto) {
                $this->atuEstProdutoOrcamento($produto->id_produto, $produto->quantidade, "DEL");
            }

            $this->orcamentoproduto_model->delete_orcamentoProduto(array('id_orcamento' => $idOrcamento));
            $quantidadeProdutos = $this->input->post('quantidadeProdutos');
            for ($i=1; $i <= $quantidadeProdutos; $i++) {
                $valorVenda = str_replace('.', '', $this->input->post('produto_prcProduto_'.$i));
                $valorVenda = str_replace(',', '.', $valorCobrado); 

                $valorCobrado = str_replace('.', '', $this->input->post('produto_prcCobrado_'.$i));
                $valorCobrado = str_replace(',', '.', $valorCobrado);            
                
                $desconto   = str_replace('%', '', $this->input->post('produto_desconto_'.$i));
                $idProduto  = $this->input->post('produto_codigo_'.$i);
                
                $dadosProduto = array(

                    'id_produto'    => $idProduto,
                    'id_orcamento'  => $idOrcamento,
                    'quantidade'    => $this->input->post('produto_quantidade_'.$i),
                    'desconto'      => $desconto,
                    'preco_venda'   => $valorVenda,
                    'preco_cobrado' => $valorCobrado
                );

                $this->orcamentoproduto_model->insert_orcamentoProduto($dadosProduto);

                $dadosProduto = array(
                    'quantidade_reservada' => $this->input->post('produto_quantidade_'.$i),
                );

                $this->produto_model->update_produto($dadosProduto, array('id_produto' => $idProduto));
            }            

            $this->session->set_flashdata('message_success', 'Orçamento atualizado com sucesso!');
        }

        redirect('orcamento/listar', 'refresh');
    }

    public function atuEstProdutoOrcamento($idProduto, $quantidade, $tipo){
        $produto    = $this->produto_model->get_produto_byid($idProduto)->row();
        $qntReserva = $produto->quantidade_reservada;

        if ($tipo == "NEW") {
            $qntReserva+=$quantidade;
        } else if ($tipo == "DEL"){
            $qntReserva-=$quantidade;
        }

        $dadosProduto = array(
            'quantidade_reservada' => $qntReserva
        );

        $this->produto_model->update_produto($dadosProduto, array('id_produto' => $idProduto));
    }

    public function validarformularioOrcamento() {
        $this->form_validation->set_rules('codCliente', 'codCliente', 'required');
        return $this->form_validation;
    }
}