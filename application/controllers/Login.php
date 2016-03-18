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
        $this->load->model('perfil_model', 'perfil_model');
    }

    // Pagina inicial da aplicacao
    public function index() {
        if (isset($_SESSION['userLogin'])) {
            redirect('/admin', 'refresh');
        } else {
            //$user = $_SESSION['userLogin'];
            $message_success = $this->session->flashdata('message_success');
            $data = ['base_url' => $this->config->base_url(),
                //'user' => $user,
                'message_success' => $message_success];
            $this->twig->display('login', $data);
        }
    }

    // Valida o usuario informado na index
    public function validarUsuario() {

        // Validacao dos campos de login e senha
        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == TRUE) {

            $usuario = $this->input->post('usuario');
            $senha = md5($this->input->post('senha'));

            // echo $senha;
            // die;

            $retorno = $this->usuario_model->get_usuario_bypwd($usuario, $senha)->row();
            if ($retorno != NULL) {
                $tipo_perfil = $this->perfil_model->get_perfil_byid($retorno->id_tipo_perfil)->row();
                $data = array(
                    'nome_usuario' => $retorno->nome,
                    'usuario' => $retorno->login,
                    'tipoAcesso' => $retorno->id_tipo_perfil,
                    'NomeTipoAcesso' => $tipo_perfil->titulo,
                );

                $this->session->set_userdata('userLogin', $data);

                redirect('/admin', 'refresh');
            } else {
                $this->session->set_flashdata('message_success', 'Login ou senha invalido');
                redirect('/', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message_success', 'Login ou senha invalido');
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
