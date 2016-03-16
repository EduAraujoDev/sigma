<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('usuario_model', 'usuario_model');
        $this->load->model('perfil_model', 'perfil_model');

        if (isset($_SESSION['userLogin'])) {
            
        } else {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
        ];
        $this->twig->display('usuario/dashboard_usuario', $data);
    }

    public function listar() {
        $message_success = $this->session->flashdata('message_success');
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'usuarios' => $this->usuario_model->get_usuario_notDeleted()->result(),
            'user' => $user,
        ];
        $this->twig->display('usuario/listar', $data);
    }

    // Formulario que adiciona novo usuario
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'tipo_perfils' => $this->perfil_model->get_tiposPerfil_all()->result(),
            'user' => $user,
        ];
        $this->twig->display('usuario/novo', $data);
    }

    //Adicona novo usuario
    public function adicionar() {
        $validacao_formulario = $this->validarformularioUsuario();
        if ($validacao_formulario->run() == TRUE) {
            // Monta um array com as informacoes do usuario
            $dados = array(
                'nome' => $this->input->post('nome'),
                'login' => $this->input->post('login'),
                'email' => $this->input->post('email'),
                'id_tipo_perfil' => $this->input->post('id_tipo_perfil'),
                'senha' => md5($this->input->post('senha'))
            );
            $this->usuario_model->set_usuario($dados);
            $this->session->set_flashdata('message_success', 'Úsuario adicionado com sucesso!');
            redirect('usuario/listar', 'refresh');
        } else {
            redirect('usuario/novo', 'refresh');
        }
    }

    public function visualizar($usuario_id) {
        if ($usuario_id != NULL) {
            $usuario_id = $usuario_id;
        } else {
            $usuario_id = $this->uri->segment(3);
        }

        if ($usuario_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'tipo_perfils' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($usuario_id)->row(),
                'user' => $user,
            ];
            $this->twig->display('usuario/visualizar', $data);
        } else {
            redirect('usuario/listar', 'refresh');
        }
    }

    public function editar($usuario_id) {
        if ($usuario_id != NULL) {
            $usuario_id = $usuario_id;
        } else {
            $usuario_id = $this->uri->segment(3);
        }

        if ($usuario_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'tipo_perfils' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($usuario_id)->row(),
                'user' => $user,
            ];
            $this->twig->display('usuario/editar', $data);
        } else {
            redirect('produto/listar', 'refresh');
        }
    }

    //Atualiza o usuario na base de dados
    public function atualizar() {
        $usuario_id = $this->uri->segment(3);
        if ($usuario_id != NULL) {
            if ($this->input->post('senha') == "") {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'login' => $this->input->post('login'),
                    'email' => $this->input->post('email'),
                    'id_tipo_perfil' => $this->input->post('id_tipo_perfil')
                );
            } else {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'login' => $this->input->post('login'),
                    'email' => $this->input->post('email'),
                    'id_tipo_perfil' => $this->input->post('id_tipo_perfil'),
                    'senha' => md5($this->input->post('senha'))
                );
            }
            $this->usuario_model->update_usuario($dados, array('id_usuario' => $usuario_id));
            $this->session->set_flashdata('message_success', 'Produto editado com sucesso!');
            redirect('usuario/listar', 'refresh');
        }
    }

    // Deleta o usuario selecionado na base de dados
    public function deletar() {
        $usuario_id = $this->uri->segment(3);
        if ($usuario_id != NULL) {
            $this->usuario_model->delete_usuario(array('id_usuario' => $usuario_id));
        }
        $this->session->set_flashdata('message_success', 'Usuario deletado com sucesso!');
        redirect('usuario/listar', 'refresh');
    }

    // Validacoes de campo do formulario
    public function validarformularioUsuario() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        $this->form_validation->set_rules('id_tipo_perfil', 'id_tipo_perfil', 'required');
        return $this->form_validation;
    }

}
