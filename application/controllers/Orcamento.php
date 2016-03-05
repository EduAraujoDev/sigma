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

    public function index() {
        redirect('/admin', 'refresh');
    }

    public function __construct()
    {
        parent::__construct();

        $this->load->model('cliente_model', 'cliente_model');
    }

    // Formulario que adiciona nova orcamento
    public function novo() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('orcamento/novo', $data);
    }

    public function ajax_cliente(){
        $clientes = $this->cliente_model->get_cliente_notDeleted()->result();

        foreach ($clientes as $cliente) {
            $linha = array();
            $linha[] = $cliente->id_cliente;
            $linha[] = $cliente->nome;
            $linha[] = $cliente->cpf_cnpj;
            $linha[] = $cliente->email;
         
            $data[] = $linha;
        }
 
        $saida = array("data" => $data,);

        echo json_encode($saida);
    }

    public function adicionar() {
        var_dump($this->input->post('name'));
        var_dump($this->input->post('mail'));
        var_dump($this->input->post('mobile'));
    }
}