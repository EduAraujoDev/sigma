<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para controle de login do sistema
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('usuario_model', 'usuario_model');
    }

    // Pagina inicial da aplicacao
    public function index() {
        $data = ['base_url' => $this->config->base_url()];
        $this->twig->display('login', $data);
    }

    // Valida o usuario informado na index
    public function validarUsuario() {
        
        // Validacao dos campos de login e senha
        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == TRUE) {
           
            $usuario = $this->input->post('usuario');
            $senha = md5($this->input->post('senha'));

            $retorno = $this->usuario_model->get_usuario_bypwd($usuario, $senha)->row();

            if ($retorno != NULL) {
                if ($retorno->id_tipo_perfil == 1) {
                    $tipoAcesso = 'ADMIN';
                } else {
                    $tipoAcesso = 'USUARIO';
                }

                $data = array(
                    'usuario' => $retorno->login,
                    'tipoAcesso' => $tipoAcesso
                );

                $this->session->set_userdata('userLogin', $data);

                if ($tipoAcesso == 'ADMIN') {
                    redirect('/admin', 'refresh');
                } else {
                    redirect('/usuario', 'refresh');
                }
            } else {
                $this->session->set_flashdata('usuarioInvalido', 'Login ou senha invalido');
                redirect('/', 'refresh');
            }
        } else {
            $this->session->set_flashdata('usuarioInvalido', 'Login ou senha invalido');
            redirect('/', 'refresh');
        }
    }

    // Sai do aplicativo
    public function logout() {
        if (isset($_SESSION['userLogin'])) {
            $this->session->unset_userdata('userLogin');
            redirect('/', 'refresh');
        }
    }

}
