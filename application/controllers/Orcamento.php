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
        $this->load->model('OrdemServico_model', 'ordemservico_model');
        $this->load->model('OrdemServicoProduto_model', 'ordemServicoproduto_model');
        $this->load->model('OrdemServicoServico_model', 'ordemservicoservico_model');

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
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url'     => $this->config->base_url(),
            'message_success'   => $message_success,
            'orcamentos'        => $this->orcamento_model->get_orcamento_notDeleted()->result(),
            'status'            => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
            'tipoPagamentos'    => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
            'user'              => $user,
            'clientes'          => $this->cliente_model->get_cliente_notDeleted()->result()];
        $this->twig->display('orcamento/listar', $data);
    }    
    
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'status' => $this->orcamentostatus_model->get_orcamentoStatus_notDeleted()->result(),
            'tipoPagamentos' => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
            'user' => $user,
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

            $dataFinalizacao = $this->input->post('dataPrevistaFinalizacao');
            $dataFinalizacao = substr($dataFinalizacao, 6, 4)."-".substr($dataFinalizacao, 3, 2)."-".substr($dataFinalizacao, 0, 2);

            $dadosCabec = array(
                'id_status'                 => $this->input->post('statusOrcamento'),
                'id_cliente'                => $this->input->post('codCliente'),
                'id_tipo_pagamento'         => $this->input->post('tipoPagamento'),
                'data_criacao'              => $dataCriacao,
                'data_prevista_finalizacao' => $dataFinalizacao,
                'data_finalizacao'          => null,
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
                $vlrCobServico = str_replace('.', '', $this->input->post('servico_vlrCobrado_'.$i));
                $vlrCobServico = str_replace(',', '.', $vlrCobServico);
                
                $dadosServico = array(

                    'id_servico'    => $this->input->post('servico_codigo_'.$i),
                    'id_orcamento'  => $id,
                    'preco_cobrado' => $vlrCobServico
                );

                $this->orcamentoservico_model->insert_orcamentoServico($dadosServico);
            }

            $quantidadeProdutos = $this->input->post('quantidadeProdutos');
            for ($i=1; $i <= $quantidadeProdutos; $i++) {
                $vlrVndProduto = str_replace('.', '', $this->input->post('produto_prcProduto_'.$i));
                $vlrVndProduto = str_replace(',', '.', $vlrVndProduto); 

                $vlrCobProduto = str_replace('.', '', $this->input->post('produto_prcCobrado_'.$i));
                $vlrCobProduto = str_replace(',', '.', $vlrCobProduto);            
                
                $desconto   = str_replace('%', '', $this->input->post('produto_desconto_'.$i));
                $idProduto  = $this->input->post('produto_codigo_'.$i);

                $quantProd = $this->input->post('produto_quantidade_'.$i);
                
                $dadosProduto = array(

                    'id_produto'    => $idProduto,
                    'id_orcamento'  => $id,
                    'quantidade'    => $quantProd,
                    'desconto'      => $desconto,
                    'preco_venda'   => $vlrVndProduto,
                    'preco_cobrado' => $vlrCobProduto
                );

                $this->orcamentoproduto_model->insert_orcamentoProduto($dadosProduto);
                $this->atuEstProdutoOrcamento($idProduto, $quantProd, "I", true);
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
            $message_success = $this->session->flashdata('message_success');
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'message_success'       => $message_success,
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

            $dataFinalizacao = $this->input->post('dataPrevistaFinalizacao');
            $dataFinalizacao = substr($dataFinalizacao, 6, 4)."-".substr($dataFinalizacao, 3, 2)."-".substr($dataFinalizacao, 0, 2);

            $dadosCabec = array(
                'id_orcamento'              => $idOrcamento,
                'id_status'                 => $this->input->post('statusOrcamento'),
                'id_cliente'                => $this->input->post('codCliente'),
                'id_tipo_pagamento'         => $this->input->post('tipoPagamento'),
                'data_criacao'              => $dataCriacao,
                'data_prevista_finalizacao' => $dataFinalizacao,
                'data_finalizacao'          => null,
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
                $vlrCobServico = str_replace('.', '', $this->input->post('servico_vlrCobrado_'.$i));
                $vlrCobServico = str_replace(',', '.', $vlrCobServico);            
                
                $dadosServico = array(
                    'id_servico'    => $this->input->post('servico_codigo_'.$i),
                    'id_orcamento'  => $idOrcamento,
                    'preco_cobrado' => $vlrCobServico
                );

                $this->orcamentoservico_model->insert_orcamentoServico($dadosServico);
            }

            $produtosOrcamento = $this->orcamentoproduto_model->get_orcamentoProduto_byid($idOrcamento)->result();

            foreach ($produtosOrcamento as $produto) {
                $this->atuEstProdutoOrcamento($produto->id_produto, $produto->quantidade, "R", true);
            }

            $this->orcamentoproduto_model->delete_orcamentoProduto(array('id_orcamento' => $idOrcamento));
            $quantidadeProdutos = $this->input->post('quantidadeProdutos');
            for ($i=1; $i <= $quantidadeProdutos; $i++) {
                $vlrVndProduto = str_replace('.', '', $this->input->post('produto_prcProduto_'.$i));
                $vlrVndProduto = str_replace(',', '.', $vlrVndProduto); 

                $vlrCobProduto = str_replace('.', '', $this->input->post('produto_prcCobrado_'.$i));
                $vlrCobProduto = str_replace(',', '.', $vlrCobProduto);            
                
                $desconto   = str_replace('%', '', $this->input->post('produto_desconto_'.$i));
                $idProduto  = $this->input->post('produto_codigo_'.$i);

                $quantProd = $this->input->post('produto_quantidade_'.$i);
                
                $dadosProduto = array(

                    'id_produto'    => $idProduto,
                    'id_orcamento'  => $idOrcamento,
                    'quantidade'    => $quantProd,
                    'desconto'      => $desconto,
                    'preco_venda'   => $vlrVndProduto,
                    'preco_cobrado' => $vlrCobProduto
                );

                $this->orcamentoproduto_model->insert_orcamentoProduto($dadosProduto);
                $this->atuEstProdutoOrcamento($idProduto, $quantProd, "I", true);
            }            

            $this->session->set_flashdata('message_success', 'Orçamento atualizado com sucesso!');

            redirect('orcamento/visualizar/'.$idOrcamento, 'refresh');
        } else {
            redirect('orcamento/listar', 'refresh');
        }
    }

    public function finalizarOrcamento(){
        $idOrcamento        = $this->uri->segment(3);
        $statusOrcamento    = $this->uri->segment(4);

        if ( $idOrcamento != NULL && $statusOrcamento != NULL ) {
            if ( $statusOrcamento == 4 || $statusOrcamento == 5) {
                $dadosCabec = array( 'data_finalizacao' => date("Y-m-d") );
                
                $this->orcamento_model->update_orcamento($dadosCabec, array('id_orcamento' => $idOrcamento));
            } else if ( $statusOrcamento == 6 ) {
                $dadosCabec = array( 'data_finalizacao' => date("Y-m-d"), 'finalizado' => 1 );
                $this->orcamento_model->update_orcamento($dadosCabec, array('id_orcamento' => $idOrcamento));

                $dadosOrcamento = $this->orcamento_model->get_orcamento_byid($idOrcamento)->row();

                $dadosCabec = array(
                    'id_orcamento'              => $idOrcamento,
                    'id_status'                 => 1,
                    'id_cliente'                => $dadosOrcamento->id_cliente,
                    'id_tipo_pagamento'         => $dadosOrcamento->id_tipo_pagamento,
                    'data_criacao'              => date("Y-m-d"),
                    'data_finalizacao'          => null,
                    'desconto_adicional'        => $dadosOrcamento->desconto_adicional,
                    'desconto_total'            => $dadosOrcamento->desconto_total,
                    'total_bruto'               => $dadosOrcamento->total_bruto,
                    'total_liquido'             => $dadosOrcamento->total_liquido,
                    'data_prevista_finalizacao' => date("Y-m-d"),
                    'finalizado'                => 0,
                    'deletado'                  => 0
                );
                
                $id = $this->ordemservico_model->insert_ordemServico($dadosCabec);                

                $dadosOrcamentoProduto = $this->orcamentoproduto_model->get_orcamentoProduto_byid($idOrcamento)->result();
                
                foreach ($dadosOrcamentoProduto as $orcamentoProduto) {
                    $dadosProduto = array(
                        'id_ordem_servico'  => $id,
                        'id_produto'        => $orcamentoProduto->id_produto,
                        'quantidade'        => $orcamentoProduto->quantidade,
                        'desconto'          => $orcamentoProduto->desconto,
                        'preco_venda'       => $orcamentoProduto->preco_venda,
                        'preco_cobrado'     => $orcamentoProduto->preco_cobrado,
                        'deletado'          => 0,
                    );

                    $this->ordemServicoproduto_model->insert_ordemServicoProduto($dadosProduto);
                    $this->atuEstProdutoOrcamento($orcamentoProduto->id_produto, $orcamentoProduto->quantidade, "");
                }

                $dadosOrcamentoServico = $this->orcamentoservico_model->get_orcamentoServico_byid($idOrcamento)->result();

                foreach ($dadosOrcamentoServico as $orcamentoServico) {
                    $dadosServico = array(
                        'id_ordem_servico'  => $id,
                        'id_servico'        => $orcamentoServico->id_servico,
                        'preco_cobrado'     => $orcamentoServico->preco_cobrado,
                        'deletado'          => 0,
                    );

                    $this->ordemservicoservico_model->insert_ordemServicoServico($dadosServico);
                }
            }
            
            $this->session->set_flashdata('message_success', 'Orçamento finalizado com sucesso!');
        }

        redirect('orcamento/listar', 'refresh');        
    }

    public function atuEstProdutoOrcamento($idProduto, $quantidade, $tipo, $reserva = false){
        $produto    = $this->produto_model->get_produto_byid($idProduto)->row();
        $qntReserva = $produto->quantidade_reservada;
        $qntEstoque = $produto->quantidade_estoque;

        if ( $reserva ) {
            if ($tipo == "I") {
                $qntReserva+=$quantidade;
            } else if ($tipo == "R"){
                $qntReserva-=$quantidade;
            }

            $dadosProduto = array(
                'quantidade_reservada' => $qntReserva
            );
        } else {
            $qntEstoque = $qntEstoque - $quantidade;
            $qntReserva = $qntReserva - $quantidade;

            $dadosProduto = array(
                'quantidade_estoque'    => $qntEstoque,
                'quantidade_reservada'  => $qntReserva
            );            
        }


        $this->produto_model->update_produto($dadosProduto, array('id_produto' => $idProduto));
    }

    public function validarformularioOrcamento() {
        $this->form_validation->set_rules('codCliente', 'codCliente', 'required');
        return $this->form_validation;
    }

    public function deletar() {
        $idOrcamento = $this->uri->segment(3);

        if ($idOrcamento != NULL) {
            $orcamento_produtos = $this->orcamentoproduto_model->get_orcamentoProduto_byid($idOrcamento)->result();

            foreach ($orcamento_produtos as $produto) {
                $this->atuEstProdutoOrcamento($produto->id_produto, $produto->quantidade, "R", true);
            }

            $this->orcamento_model->delete_logical_orcamento(array('id_orcamento' => $idOrcamento));
            $this->orcamentoservico_model->delete_logical_orcamentoServico(array('id_orcamento' => $idOrcamento));
            $this->orcamentoproduto_model->delete_logical_orcamentoProduto(array('id_orcamento' => $idOrcamento));

            $this->session->set_flashdata('message_success', 'Orçamento removido com sucesso!');
        }
        redirect('orcamento/listar', 'refresh');
    }    
}