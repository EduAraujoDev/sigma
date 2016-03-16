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

    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['userLogin'])) {
            
        } else {
            redirect('/', 'refresh');
        }
    }

    // Formulario que adiciona nova orcamento
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
        ];
        $this->twig->display('orcamento/novo', $data);
    }

    public function adicionar() {
        var_dump($this->input->post('name'));
        var_dump($this->input->post('mail'));
        var_dump($this->input->post('mobile'));
    }

}
