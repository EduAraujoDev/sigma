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
        $produtos = $this->produto_model->get_produto_notDeleted()->result();

        if ($tipo_busca == "nome") {
            $produtos = $this->produto_model->get_produto_by_nome($busca)->result();
        }
        if ($tipo_busca == "codigo") {
            $produtos = $this->produto_model->get_produto_by_codigo($busca)->result();
        }

        $data = array(
            'base_url' => $this->config->base_url(),
            'produtos' => $produtos,
            'user' => $user,
        );
        $this->twig->display('produto/listar', $data);
    }

    // Pagina que lista os produos
    public function listar() {
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $message_error = $this->session->flashdata('message_error');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'message_error' => $message_error,
            'user' => $user,
            'produtos' => $this->produto_model->get_produto_notDeleted()->result()
        ];

        $this->twig->display('produto/listar', $data);
    }

    // Formulario que adiciona novo produto
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            //'categorias' => $this->categoria_model->get_categoria_all()->result(),
            'categorias' => $this->categoria_model->get_categoria_notDeleted()->result(),
            //'marcas' => $this->marca_model->get_marca_all()->result()
            'marcas' => $this->marca_model->get_marca_notDeleted()->result(),
            'user' => $user,
        ];
        $this->twig->display('produto/novo', $data);
    }

    //Adicona novo produto
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioProduto();
        if ($validacao_formulario->run() == TRUE) {
            $valorCusto = str_replace('.', '', $this->input->post('valorCusto'));
            $valorCusto = str_replace(',', '.', $valorCusto);
            $valoVenda = str_replace('.', '', $this->input->post('valorVenda'));
            $valoVenda = str_replace(',', '.', $valoVenda);

            // Monta um array com as informacoes do produto
            $dados = array(
                'nome' => $this->input->post('nome'),
                'quantidade_estoque' => $this->input->post('quantEstoque'),
                //'quantidade_reservada' => $this->input->post('quantReservada'),
                'quantidade_reservada' => 0,
                'valor_custo' => $valorCusto,
                'valor_venda' => $valoVenda,
                'id_categoria' => $this->input->post('categoria'),
                'id_marca' => $this->input->post('marca'),
                'codigo_fabricante' => $this->input->post('codFornecedor'),
                'deletado' => 0
            );

            $this->produto_model->set_produto($dados);
            $this->session->set_flashdata('message_success', 'Produto adicionado com sucesso!');
            redirect('produto/listar', 'refresh');
        } else {
            redirect('produto/novo', 'refresh');
        }
    }

    public function visualizar($produto_id) {
        if ($produto_id != NULL) {
            $produto_id = $produto_id;
        } else {
            $produto_id = $this->uri->segment(3);
        }

        if ($produto_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'categorias' => $this->categoria_model->get_categoria_all()->result(),
                'marcas' => $this->marca_model->get_marca_all()->result(),
                'user' => $user,
                'produto' => $this->produto_model->get_produto_byid($produto_id)->row()];
            $this->twig->display('produto/visualizar', $data);
        } else {
            redirect('produto/listar', 'refresh');
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
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'categorias' => $this->categoria_model->get_categoria_all()->result(),
                'user' => $user,
                'marcas' => $this->marca_model->get_marca_all()->result(),
                'produto' => $this->produto_model->get_produto_byid($produto_id)->row()];
            $this->twig->display('produto/editar', $data);
        } else {
            redirect('produto/listar', 'refresh');
        }
    }

    //Atualiza o produto na base de dados
    public function atualizar() {
        $produto_id = $this->uri->segment(3);
        if ($produto_id != NULL) {
            //echo 'bu'; mostra a variavel na tela
            //var_dump('a'); mostra a variavel e o tipo
            //die; para a execucao do codigo!
            $valorCusto = str_replace('.', '', $this->input->post('valorCusto'));
            $valorCusto = str_replace(',', '.', $valorCusto);

            $valoVenda = str_replace('.', '', $this->input->post('valorVenda'));
            $valoVenda = str_replace(',', '.', $valoVenda);
            $dados = array(
                'nome' => $this->input->post('nome'),
                'quantidade_estoque' => $this->input->post('quantEstoque'),
                'quantidade_reservada' => $this->input->post('quantReservada'),
                'valor_custo' => $valorCusto,
                'valor_venda' => $valoVenda,
                'id_categoria' => $this->input->post('categoria'),
                'id_marca' => $this->input->post('marca'),
                'codigo_fabricante' => $this->input->post('codFornecedor'),
            );

            $this->produto_model->update_produto($dados, array('id_produto' => $produto_id));
            $this->session->set_flashdata('message_success', 'Produto editado com sucesso!');
        }

        redirect('produto/listar', 'refresh');
    }

    // Deleta o produto selecionado na base de dados
    public function deletar() {
        // Carrega variavel com o id contido na url
        $produto_id = $this->uri->segment(3);

        if ($produto_id != NULL) {
            //$this->produto_model->delete_produto(array('id_produto' => $produto_id));
            $this->produto_model->delete_logical_produto(array('id_produto' => $produto_id));
            $this->session->set_flashdata('message_success', 'Produto removido com sucesso!');
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

    public function ajax_produto() {
        $produtos = $this->produto_model->get_produto_notDeleted()->result();
        $data = array();

        foreach ($produtos as $produto) {
            $linha = array();
            $linha[] = $produto->id_produto;
            $linha[] = $produto->nome;
            $linha[] = $produto->quantidade_estoque;
            $linha[] = $produto->quantidade_reservada;
            $linha[] = number_format($produto->valor_venda, 2, ',', '.');

            $data[] = $linha;
        }

        $saida = array("data" => $data);

        echo json_encode($saida);
    }

    public function ajax_produto_byId($id){
        $produto = $this->produto_model->get_produto_byid($id)->row();

        echo json_encode($produto);
    }    
}