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
        $this->load->model('fornecedor_model', 'fornecedor_model');

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

    // Pagina que lista os fornecedores
    public function listarFornecedor(){
        $data = ['base_url' => $this->config->base_url(),            
            'fornecedores' => $this->fornecedor_model->get_fornecedor_all()->result()];

        $this->twig->display('admin/listarFornecedor', $data); 
    }

    // Pagina com o formulario para inclusao de novo fornecedor
    public function incluirFornecedor() {
        $data = ['base_url' => $this->config->base_url(),
            'UFS' => array('SP', 'RJ')];

        $this->twig->display('admin/incluirFornecedor', $data);
    } 

    // Grava o fornecedor na base de dados
    public function incluirNovoFornecedor() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('nomeFantasia', 'nomeFantasia', 'required');
        $this->form_validation->set_rules('cnpj', 'cnpj', 'required');
        $this->form_validation->set_rules('ie', 'ie', 'required');
        $this->form_validation->set_rules('logradouro', 'logradouro', 'required');
        $this->form_validation->set_rules('numero', 'numero', 'required');
        $this->form_validation->set_rules('complemento', 'complemento', 'required');
        $this->form_validation->set_rules('bairro', 'bairro', 'required');
        $this->form_validation->set_rules('cidade', 'cidade', 'required');
        $this->form_validation->set_rules('uf', 'uf', 'required');
        $this->form_validation->set_rules('cep', 'cep', 'required');
        $this->form_validation->set_rules('telFixo', 'telFixo', 'required');
        $this->form_validation->set_rules('telCel', 'telCel', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {
            // Monta um array com as informacoes do fornecedor
            $dados = array(
                'nome'          => $this->input->post('nome'),
                'nome_fantasia' => $this->input->post('nomeFantasia'),
                'cpf_cnpj'      => $this->input->post('cnpj'),
                'ierg'          => $this->input->post('ie'),
                'data_fundacao' => $this->input->post('logradouro'),
                'logradouro'    => $this->input->post('logradouro'),
                'numero'        => $this->input->post('numero'),
                'complemento'   => $this->input->post('complemento'),
                'bairro'        => $this->input->post('bairro'),
                'cidade'        => $this->input->post('cidade'),
                'uf'            => $this->input->post('uf'),
                'cep'           => $this->input->post('cep'),
                'telefone_fixo' => $this->input->post('telFixo'),
                'celular'       => $this->input->post('telCel'),
                'email'         => $this->input->post('email'),
                'observacoes'   => $this->input->post('obs')
            );

            $this->fornecedor_model->set_fornecedor($dados);

            $this->session->set_flashdata('fornecedorOk', 'Fornecedor cadastrado!');

            redirect('admin/listarFornecedor', 'refresh');
        } else {
            redirect('admin/incluirFornecedor', 'refresh');
        }
    }

    // Pagina com o formulario para alterar o fornecedor selecionado
    public function alterarFornecedor() {
        // Carrega variavel com o id contido na url
        $idFornecedor = $this->uri->segment(3);

        if ($idFornecedor <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'fornecedor' => $this->fornecedor_model->get_fornecedor_byid($idFornecedor)->row()];

            $this->twig->display('admin/alterarFornecedor', $data);
        } else {
            redirect('admin/listarFornecedor', 'refresh');
        }
    }

    // Altera as informacoes do fornecedor selecionado na base de dados
    public function alteraFornecedorSelecionado() {
        // Validacoes de campo do formulario
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('nomeFantasia', 'nomeFantasia', 'required');
        $this->form_validation->set_rules('cnpj', 'cnpj', 'required');
        $this->form_validation->set_rules('ie', 'ie', 'required');
        $this->form_validation->set_rules('logradouro', 'logradouro', 'required');
        $this->form_validation->set_rules('numero', 'numero', 'required');
        $this->form_validation->set_rules('complemento', 'complemento', 'required');
        $this->form_validation->set_rules('bairro', 'bairro', 'required');
        $this->form_validation->set_rules('cidade', 'cidade', 'required');
        $this->form_validation->set_rules('uf', 'uf', 'required');
        $this->form_validation->set_rules('cep', 'cep', 'required');
        $this->form_validation->set_rules('telFixo', 'telFixo', 'required');
        $this->form_validation->set_rules('telCel', 'telCel', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        // Carrega variavel com o id contido na url
        $idFornecedor = $this->uri->segment(3);

        if ($this->form_validation->run() == TRUE) {
            $dados = array(
                'nome'          => $this->input->post('nome'),
                'nome_fantasia' => $this->input->post('nomeFantasia'),
                'cpf_cnpj'      => $this->input->post('cnpj'),
                'ierg'          => $this->input->post('ie'),
                'data_fundacao' => $this->input->post('logradouro'),
                'logradouro'    => $this->input->post('logradouro'),
                'numero'        => $this->input->post('numero'),
                'complemento'   => $this->input->post('complemento'),
                'bairro'        => $this->input->post('bairro'),
                'cidade'        => $this->input->post('cidade'),
                'uf'            => $this->input->post('uf'),
                'cep'           => $this->input->post('cep'),
                'telefone_fixo' => $this->input->post('telFixo'),
                'celular'       => $this->input->post('telCel'),
                'email'         => $this->input->post('email'),
                'observacoes'   => $this->input->post('obs')
            );

            $this->fornecedor_model->update_fornecedor($dados, array('id_fornecedor' => $idFornecedor));

            $this->session->set_flashdata('funcionarioOk', 'Funcionario alterado!');

            redirect('admin/listarFornecedor', 'refresh');
        } else {
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'fornecedor' => $this->fornecedor_model->get_fornecedor_byid($idFornecedor)->row()];

            $this->twig->display('admin/alterarFornecedor', $data);            
        }
    }

    // Pagina com as informacoes do fornecedor a ser selecionado
    public function deletarFornecedor() {
        // Carrega variavel com o id contido na url
        $idFornecedor = $this->uri->segment(3);

        if ($idFornecedor <> NULL) {
            $data = ['base_url' => $this->config->base_url(),
                'UFS' => array('SP', 'RJ'),
                'fornecedor' => $this->fornecedor_model->get_fornecedor_byid($idFornecedor)->row()];

            $this->twig->display('admin/deletarFornecedor', $data);
        } else {
            redirect('admin/listarFornecedor', 'refresh');
        }
    }

    // Deleta o fornecedor selecionado na base de dados
    public function deletarFornecedorSelecionado() {
        // Carrega variavel com o id contido na url
        $idFornecedor = $this->uri->segment(3);

        if ($idFornecedor <> NULL) {
            // Deleta o usuario na base de dadps
            $this->fornecedor_model->delete_fornecedor(array('id_fornecedor' => $idFornecedor));

            $this->session->set_flashdata('fornecedorOk', 'Fornecedor deletado!');
        } else {
            $this->session->set_flashdata('fornecedorOk', 'Erro ao excluir fornecedor!');
        }

        redirect('admin/listarFornecedor', 'refresh');
    }
}