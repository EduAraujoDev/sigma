<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para usuario com perfil de administrador
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('usuario_model', 'usuario_model');
        $this->load->model('perfil_model', 'perfil_model');
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

    // Pagina inicial para usuario administrador
    public function index() {
        $user = $_SESSION['userLogin']["usuario"];
        $data = array(
            'base_url' => $this->config->base_url(),
            'nome' => $user,
        );
        $this->twig->display('admin/dashboard_admin', $data);
    }

    // Pagina que lista os usuarios
    public function listarUsuario() {
        $data = ['base_url' => $this->config->base_url(),
            'usuarios' => $this->usuario_model->get_usuario_perfil()->result()];

        $this->twig->display('admin/listarUsuario', $data);
    }

    // Pagina com o formulario para inclusao de novo usuario
    public function incluirUsuario() {
        $data = ['base_url' => $this->config->base_url(),
            'tiposPerfis' => $this->perfil_model->get_tiposPerfil_all()->result()];

        $this->twig->display('admin/incluirUsuario', $data);
    }

    // Grava o usuario na base de dados
    public function incluirNovoUsuario() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('login', 'login', 'required|is_unique[usuario.login]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('perfil', 'perfil', 'required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        if ($this->form_validation->run() == TRUE) {
            // Monta um array com as informacoes do usuario
            $dados = array(
                'nome' => $this->input->post('nome'),
                'login' => $this->input->post('login'),
                'email' => $this->input->post('email'),
                'senha' => md5($this->input->post('senha1')),
                'id_tipo_perfil' => $this->input->post('perfil')
            );

            // Altera as informacoes do usuario
            $this->usuario_model->set_usuario($dados);

            $this->session->set_flashdata('usuarioOk', 'Usuario cadastrado!');

            redirect('admin/listarUsuario', 'refresh');
        } else {
            redirect('admin/incluirUsuario', 'refresh');
        }
    }

    // Pagina com o formulario para alterar o usuario selecionado
    public function alterarUsuario() {
        // Carrega variavel com o id contido na url
        $idUsuario = $this->uri->segment(3);

        if ($idUsuario <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'tiposPerfis' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($idUsuario)->row()];

            $this->twig->display('admin/alterarUsuario', $data);
        } else {
            redirect('admin/listarUsuario', 'refresh');
        }
    }

    // Altera as informacoes do usuario selecionado na base de dados
    public function alteraUsuarioSelecionado() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('perfil', 'perfil', 'required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        // Carrega variavel com o id contido na url
        $idUsuario = $this->uri->segment(3);

        if ($this->form_validation->run() == TRUE) {
            $dados = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => md5($this->input->post('senha1')),
                'id_tipo_perfil' => $this->input->post('perfil')
            );

            $this->usuario_model->update_usuario($dados, array('id_usuario' => $idUsuario));

            $this->session->set_flashdata('usuarioOk', 'Usuario alterado!');

            redirect('admin/listarUsuario', 'refresh');
        } else {
            $data = ['base_url' => $this->config->base_url(),
                'tiposPerfis' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($idUsuario)->row()];

            $this->twig->display('admin/alterarUsuario', $data);
        }
    }

    // Pagina com as informacoes do usuario a ser selecionado
    public function deletarUsuario() {
        // Carrega variavel com o id contido na url
        $idUsuario = $this->uri->segment(3);

        if ($idUsuario <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'tiposPerfis' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($idUsuario)->row()];

            $this->twig->display('admin/deletarUsuario', $data);
        } else {
            redirect('admin/listarUsuario', 'refresh');
        }
    }

    // Deleta o usuario selecionado na base de dados
    public function deletarUsuarioSelecionado() {
        // Carrega variavel com o id contido na url
        $idUsuario = $this->uri->segment(3);

        if ($idUsuario <> NULL) {
            // Deleta o usuario na base de dadps
            $this->usuario_model->delete_usuario(array('id_usuario' => $idUsuario));

            $this->session->set_flashdata('usuarioOk', 'Usuario deletado!');
        } else {
            $this->session->set_flashdata('usuarioOk', 'Erro ao excluir usuário!');
        }

        redirect('admin/listarUsuario', 'refresh');
    }

    // Pagina que lista as Marcas
    public function listarMarca() {
        $data = ['base_url' => $this->config->base_url(),
            'marcas' => $this->marca_model->get_marca_all()->result()];

        $this->twig->display('admin/listarMarca', $data);
    }

    // Pagina com o formulario para inclusao da nova marca
    public function incluirMarca() {
        $data = ['base_url' => $this->config->base_url()];

        $this->twig->display('admin/incluirMarca', $data);
    }

    // Grava a marca na base de dados
    public function incluirNovaMarca() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('descricao', 'descricao', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Monta um array com as informacoes da marca
            $dados = array(
                'titulo' => $this->input->post('descricao')
            );

            $this->marca_model->set_marca($dados);

            $this->session->set_flashdata('marcaOk', 'Marca cadastrada!');

            redirect('admin/listarMarca', 'refresh');
        } else {
            redirect('admin/incluirMarca', 'refresh');
        }
    }

    // Pagina com a marca para alterar o fornecedor selecionado
    public function alterarMarca() {
        // Carrega variavel com o id contido na url
        $idMarca = $this->uri->segment(3);

        if ($idMarca <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'marca' => $this->marca_model->get_marca_byid($idMarca)->row()];

            $this->twig->display('admin/alterarMarca', $data);
        } else {
            redirect('admin/listarMarca', 'refresh');
        }
    }

    // Altera as informacoes da marca selecionada na base de dados
    public function alteraMarcaSelecionada() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('descricao', 'descricao', 'required');

        // Carrega variavel com o id contido na url
        $idMarca = $this->uri->segment(3);

        if ($this->form_validation->run() == TRUE) {
            $dados = array(
                'titulo' => $this->input->post('descricao')
            );

            $this->marca_model->update_marca($dados, array('id_marca' => $idMarca));

            $this->session->set_flashdata('marcaOk', 'Marca alterada!');

            redirect('admin/listarMarca', 'refresh');
        } else {
            $data = ['base_url' => $this->config->base_url(),
                'marca' => $this->marca_model->get_marca_byid($idMarca)->row()];

            $this->twig->display('admin/alterarMarca', $data);
        }
    }

    // Pagina com as informacoes da marca a ser selecionado
    public function deletarMarca() {
        // Carrega variavel com o id contido na url
        $idMarca = $this->uri->segment(3);

        if ($idMarca <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'marca' => $this->marca_model->get_marca_byid($idMarca)->row()];

            $this->twig->display('admin/deletarMarca', $data);
        } else {
            redirect('admin/listarMarca', 'refresh');
        }
    }

    // Deleta a marca selecionado na base de dados
    public function deletarMarcaSelecionado() {
        // Carrega variavel com o id contido na url
        $idMarca = $this->uri->segment(3);

        if ($idMarca <> NULL) {
            // Deleta o usuario na base de dadps
            $this->marca_model->delete_marca(array('id_marca' => $idMarca));

            $this->session->set_flashdata('marcaOk', 'Marca deletado!');
        } else {
            $this->session->set_flashdata('marcaOk', 'Erro ao excluir Marca!');
        }

        redirect('admin/listarMarca', 'refresh');
    }

}
