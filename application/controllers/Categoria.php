<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para categoria
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categoria_model', 'categoria_model');
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

    // Pagina que lista as categorias
    public function listar() {
        $data = ['base_url' => $this->config->base_url(),
            'categorias' => $this->categoria_model->get_categoria_all()->result()];
        $this->twig->display('categoria/listar', $data);
    }

    // Formulario que adiciona nova categoria
    public function novo() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('categoria/novo', $data);
    }

    //Adicona nova categoria
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioCategoria();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes da categoria
            $dados = array(
                'titulo' => $this->input->post('descricao')
            );
            $this->categoria_model->set_categoria($dados);
            redirect('categoria/listar', 'refresh');
        } else {
            redirect('categoria/novo', 'refresh');
        }
    }

    // Pagina com o formulario para alterar a categoria selecionado
    public function editar($categoria_id) {
        if ($categoria_id != NULL) {
            $categoria_id = $categoria_id;
        } else {
            $categoria_id = $this->uri->segment(3);
        }
        if ($categoria_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'categoria' => $this->categoria_model->get_categoria_byid($categoria_id)->row()];
            $this->twig->display('categoria/editar', $data);
        } else {
            redirect('categoria/listar', 'refresh');
        }
    }

    //Atualiza a categoria na base de dados
    public function atualizar() {
        $categoria_id = $this->uri->segment(3);
        if ($categoria_id != NULL) {
            $validacao_formulario = $this->validarformularioCategoria();
            if ($validacao_formulario->run() == TRUE) {
                $dados = array(
                    'titulo' => $this->input->post('descricao')
                );
                $this->categoria_model->update_categoria($dados, array('id_categoria' => $categoria_id));
            }
        }
        $this->editar($categoria_id);
    }

    // Deleta a categoria selecionada na base de dados
    public function deletar() {
        $categoria_id = $this->uri->segment(3);
        if ($categoria_id != NULL) {
            // Deleta a categotia na base de dadps
            $this->categoria_model->delete_categoria(array('id_Categoria' => $categoria_id));
        }
        redirect('categoria/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioCategoria() {
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        return $this->form_validation;
    }

}
