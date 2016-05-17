<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class OrdemServico extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->model('OrdemServico_model', 'ordemservico_model');
        $this->load->model('OrdemServicoProduto_model', 'ordemservicoproduto_model');
        $this->load->model('OrdemServicoServico_model', 'ordemservicoservico_model');
        $this->load->model('OrdemServicoStatus_model', 'ordemservicostatus_model');

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
            'ordemServicos'     => $this->ordemservico_model->get_ordemServico_notDeleted()->result(),
            'status'            => $this->ordemservicostatus_model->get_ordemServicoStatus_notDeleted()->result(),
            'tipoPagamentos'    => $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
            'user'              => $user,
            'clientes'          => $this->cliente_model->get_cliente_notDeleted()->result()];
        $this->twig->display('ordemservico/listar', $data);
    }

    public function visualizar($ordemServico_id) {
        if ($ordemServico_id != NULL) {
            $ordemServico_id = $ordemServico_id;
        } else {
            $ordemServico_id = $this->uri->segment(3);
        }

        if ($ordemServico_id != NULL) {
            $message_success = $this->session->flashdata('message_success');
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'message_success'			=> $message_success,
                'ordemServico_cabecalho'	=> $this->ordemservico_model->get_ordemServico_byid($ordemServico_id)->row(),
                'ordemServico_produtos'    	=> $this->ordemservicoproduto_model->get_ordemServicoProduto_byid($ordemServico_id)->result(),
                'ordemServico_servicos'    	=> $this->ordemservicoservico_model->get_ordemServicoServico_byid($ordemServico_id)->result(),
                'status'                	=> $this->ordemservicostatus_model->get_ordemServicoStatus_notDeleted()->result(),
                'tipoPagamentos'        	=> $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
                'clientes'              	=> $this->cliente_model->get_cliente_notDeleted()->result(),
                'produtos'              	=> $this->produto_model->get_produto_notDeleted()->result(),
                'servicos'              	=> $this->servico_model->get_servico_notDeleted()->result(),                
                'user' => $user,
            ];
            $this->twig->display('ordemservico/visualizar', $data);
        } else {
            redirect('OrdemServico/listar', 'refresh');
        }
    }

    public function editar($ordemServico_id) {
        if ($ordemServico_id != NULL) {
            $ordemServico_id = $ordemServico_id;
        } else {
            $ordemServico_id = $this->uri->segment(3);
        }

        if ($ordemServico_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'ordemServico_cabecalho'	=> $this->ordemservico_model->get_ordemServico_byid($ordemServico_id)->row(),
                'ordemServico_produtos'    	=> $this->ordemservicoproduto_model->get_ordemServicoProduto_byid($ordemServico_id)->result(),
                'ordemServico_servicos'    	=> $this->ordemservicoservico_model->get_ordemServicoServico_byid($ordemServico_id)->result(),
                'status'                	=> $this->ordemservicostatus_model->get_ordemServicoStatus_notDeleted()->result(),
                'tipoPagamentos'        	=> $this->tipopagamento_model->get_tipoPagamento_notDeleted()->result(),
                'clientes'              	=> $this->cliente_model->get_cliente_notDeleted()->result(),
                'produtos'              	=> $this->produto_model->get_produto_notDeleted()->result(),
                'servicos'              	=> $this->servico_model->get_servico_notDeleted()->result(),                
                'user' => $user,
            ];
            $this->twig->display('ordemservico/editar', $data);
        } else {
            redirect('OrdemServico/listar', 'refresh');
        }
    }

    public function atualizar() {
        $ordemServico_id = $this->uri->segment(3);

        if ($ordemServico_id != NULL) {
            $totalValorBruto = str_replace('.', '', $this->input->post('totalValorBruto'));
            $totalValorBruto = str_replace(',', '.', $totalValorBruto);

            $totalValorLiquido = str_replace('.', '', $this->input->post('totalValorLiquido'));
            $totalValorLiquido = str_replace(',', '.', $totalValorLiquido);

            $dataCriacao = $this->input->post('dataCriacao');
            $dataCriacao = substr($dataCriacao, 6, 4)."-".substr($dataCriacao, 3, 2)."-".substr($dataCriacao, 0, 2);

            $dataFinalizacao = $this->input->post('dataPrevistaFinalizacao');
            $dataFinalizacao = substr($dataFinalizacao, 6, 4)."-".substr($dataFinalizacao, 3, 2)."-".substr($dataFinalizacao, 0, 2);

            $dadosCabec = array(
            	'id_ordem_servico'			=> $ordemServico_id,
                'id_orcamento'              => $this->input->post('codOrcamento'),
                'id_status'                 => $this->input->post('statusOrdemServico'),
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

            $this->ordemservico_model->update_ordemServico($dadosCabec, array('id_ordem_servico' => $ordemServico_id));
            
            $this->ordemservicoservico_model->delete_ordemServicoServico(array('id_ordem_servico' => $ordemServico_id));
            $quantidadeServicos = $this->input->post('quantidadeServicos');
            for ($i=1; $i <= $quantidadeServicos; $i++) {
                $vlrCobServico = str_replace('.', '', $this->input->post('servico_vlrCobrado_'.$i));
                $vlrCobServico = str_replace(',', '.', $vlrCobServico);            
                
                $dadosServico = array(
                    'id_servico'		=> $this->input->post('servico_codigo_'.$i),
                    'id_ordem_servico'  => $ordemServico_id,
                    'preco_cobrado'		=> $vlrCobServico,
                    'deletado'			=> 0
                );

                $this->ordemservicoservico_model->insert_ordemServicoServico($dadosServico);
            }

            $produtosOrdemServico = $this->ordemservicoproduto_model->get_ordemServicoProduto_byid($ordemServico_id)->result();

            foreach ($produtosOrdemServico as $produto) {
                $this->atuEstProdutoOrdemServico($produto->id_produto, $produto->quantidade, "R");
            }

            $this->ordemservicoproduto_model->delete_ordemServicoProduto(array('id_ordem_servico' => $ordemServico_id));
            
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
                	'id_produto'    	=> $idProduto,
                    'id_ordem_servico'	=> $ordemServico_id,
                    'quantidade'		=> $quantProd,
                    'desconto'			=> $desconto,
                    'preco_venda'		=> $vlrVndProduto,
                    'preco_cobrado'		=> $vlrCobProduto,
                    'deletado'			=> 0
                );

                $this->ordemservicoproduto_model->insert_ordemServicoProduto($dadosProduto);
                $this->atuEstProdutoOrdemServico($idProduto, $quantProd, "I");
            }            

            $this->session->set_flashdata('message_success', 'Orçamento atualizado com sucesso!');

            redirect('OrdemServico/visualizar/'.$ordemServico_id, 'refresh');
        } else {
            redirect('OrdemServico/listar', 'refresh');
        }
    }

    public function atuEstProdutoOrdemServico($idProduto, $quantidade, $tipo){
        $produto    = $this->produto_model->get_produto_byid($idProduto)->row();
        $qntEstoque = $produto->quantidade_estoque;

       	if ($tipo == "I") {
            $qntEstoque = $qntEstoque - $quantidade;
        } else if ($tipo == "R"){
            $qntEstoque = $qntEstoque + $quantidade;
        }

        $dadosProduto = array(
            'quantidade_estoque' => $qntEstoque,
        );

        $this->produto_model->update_produto($dadosProduto, array('id_produto' => $idProduto));
    }    

    public function deletar() {
        $ordemServico_id = $this->uri->segment(3);

        if ($ordemServico_id != NULL) {
            $ordemServicoProdutos = $this->ordemservicoproduto_model->get_ordemServicoProduto_byid($ordemServico_id)->result();

            foreach ($ordemServicoProdutos as $produto) {
                $this->atuEstProdutoOrdemServico($produto->id_produto, $produto->quantidade, "R");
            }

            $this->ordemservico_model->delete_logical_ordemServico(array('id_ordem_servico' => $ordemServico_id));
            $this->ordemservicoservico_model->delete_logical_ordemServicoServico(array('id_ordem_servico' => $ordemServico_id));
            $this->ordemservicoproduto_model->delete_logical_ordemServicoProduto(array('id_ordem_servico' => $ordemServico_id));

            $this->session->set_flashdata('message_success', 'Orçamento removido com sucesso!');
        }

        redirect('OrdemServico/listar', 'refresh');
    }
}