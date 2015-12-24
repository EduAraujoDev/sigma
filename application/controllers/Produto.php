<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para o produto
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('produto_model', 'produto_model');
        $this->load->model('categoria_model', 'categoria_model');
        $this->load->model('marca_model', 'marca_model');
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

    // Pagina que lista os produos
    public function listar() {
        $data = ['base_url' => $this->config->base_url(),
            'produtos' => $this->produto_model->get_produto_all()->result()];

        $this->twig->display('produto/listar', $data);
    }

    // Formulario que adiciona novo produto
    public function novo() {
        $data = ['base_url' => $this->config->base_url(),
            'categorias' => $this->categoria_model->get_categoria_all()->result(),
            'marcas' => $this->marca_model->get_marca_all()->result()];
        $this->twig->display('produto/novo', $data);
    }

    //Adicona novo produto
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioProduto();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes do produto
            $dados = array(
                'nome' => $this->input->post('nome'),
                'quantidade_estoque' => $this->input->post('quantEstoque'),
                'quantidade_reservada' => $this->input->post('quantReservada'),
                'valor_custo' => $this->input->post('valorCusto'),
                'valor_venda' => $this->input->post('valorVenda'),
                'id_categoria' => $this->input->post('categoria'),
                'id_marca' => $this->input->post('marca'),
                'deletado' => 0
            );

            $this->produto_model->set_produto($dados);
            redirect('produto/listar', 'refresh');
        } else {
            redirect('produto/novo', 'refresh');
        }
    }

    // Pagina com o formulario para alterar o produto selecionado
    public function editar($produto_id) {
        if ($produto_id != NULL) {
            $produto_id = $produto_id;
        } else {
            $produto_id = $this->uri->segment(3);
        }

        if ($produto_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'categorias' => $this->categoria_model->get_categoria_all()->result(),
                'marcas' => $this->marca_model->get_marca_all()->result(),
                'produto' => $this->produto_model->get_produto_byid($produto_id)->row()];
            $this->twig->display('produto/editar', $data);
        } else {
            redirect('admin/listarProduto', 'refresh');
        }
    }

    //Atualiza o produto na base de dados
    public function atualizar() {
        $produto_id = $this->uri->segment(3);
        if ($produto_id != NULL) {
            // Validacoes de campo do formulario
            $validacao_formulario = $this->validarformularioProduto();
            if ($validacao_formulario->run() == TRUE) {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'quantidade_estoque' => $this->input->post('quantEstoque'),
                    'quantidade_reservada' => $this->input->post('quantReservada'),
                    'valor_custo' => $this->input->post('valorCusto'),
                    'valor_venda' => $this->input->post('valorVenda'),
                    'id_categoria' => $this->input->post('categoria'),
                    'id_marca' => $this->input->post('marca')
                );

                $this->produto_model->update_produto($dados, array('id_produto' => $produto_id));
            }
        }
        $this->editar($produto_id);
    }

    // Deleta o produto selecionado na base de dados
    public function deletar() {
        // Carrega variavel com o id contido na url
        $produto_id = $this->uri->segment(3);

        if ($produto_id != NULL) {
            //$this->produto_model->delete_produto(array('id_produto' => $produto_id));
            $this->produto_model->delete_logical_produto(array('id_produto' => $produto_id));
        }
        redirect('produto/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioProduto() {
        $this->form_validation->set_rules('quantEstoque', 'quantEstoque', 'required');
        $this->form_validation->set_rules('valorCusto', 'valorCusto', 'required');
        $this->form_validation->set_rules('valorVenda', 'valorVenda', 'required');
        $this->form_validation->set_rules('marca', 'marca', 'required|is_natural');
        $this->form_validation->set_rules('categoria', 'categoria', 'required|is_natural');
        return $this->form_validation;
    }

}