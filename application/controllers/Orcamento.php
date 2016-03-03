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

    // Formulario que adiciona nova orcamento
    public function novo() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('orcamento/novo', $data);
    }

    public function adicionar() {
        var_dump($this->input->post('name'));
        var_dump($this->input->post('mail'));
        var_dump($this->input->post('mobile'));
    }

}
