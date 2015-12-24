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
class Marca extends CI_Controller {

    public function __construct() {
        parent::__construct();
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

    // Pagina que lista as marcas
    public function listar() {
        $data = ['base_url' => $this->config->base_url(),
            'marcas' => $this->marca_model->get_marca_all()->result()];
        $this->twig->display('marca/listar', $data);
    }

    // Formulario que adiciona nova marca
    public function novo() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('marca/novo', $data);
    }

    //Adicona nova marca
    public function adicionar() {
        // Validacoes de campo do formulario
        $validacao_formulario = $this->validarformularioMarca();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes da marca
            $dados = array(
                'titulo' => $this->input->post('descricao'),
                'deletado' => 0
            );
            $this->marca_model->set_marca($dados);
            redirect('marca/listar', 'refresh');
        } else {
            redirect('marca/novo', 'refresh');
        }
    }

    // Pagina com o formulario para alterar a marca selecionada
    public function editar($marca_id) {
        if ($marca_id != NULL) {
            $marca_id = $marca_id;
        } else {
            $marca_id = $this->uri->segment(3);
        }

        if ($marca_id != NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'marca' => $this->marca_model->get_marca_byid($marca_id)->row()];
            $this->twig->display('marca/editar', $data);
        } else {
            redirect('marca/listar', 'refresh');
        }
    }

    //Atualiza a marca na base de dados
    public function atualizar() {
        $marca_id = $this->uri->segment(3);
        if ($marca_id != NULL) {
            // Validacoes de campo do formulario
            $validacao_formulario = $this->validarformularioMarca();
            if ($validacao_formulario->run() == TRUE) {
                $dados = array(
                    'titulo' => $this->input->post('descricao')
                );
                $this->marca_model->update_marca($dados, array('id_marca' => $marca_id));
            }
        }
        $this->editar($marca_id);
    }

    // Deleta a marca selecionado na base de dados
    public function deletar() {
        // Carrega variavel com o id contido na url
        $marca_id = $this->uri->segment(3);
        if ($marca_id != NULL) {
            //$this->marca_model->delete_marca(array('id_marca' => $marca_id));
            $this->marca_model->delete_logical_marca(array('id_marca' => $marca_id));
        }
        redirect('marca/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioMarca() {
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        return $this->form_validation;
    }

}
