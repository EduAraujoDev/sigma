<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Controller para o produto
 * 
 * @author Eduardo Araujo <eduardo.araujo0@outlook.com>
 * @author Vitor Mantovani <vtrmantovani@gmail.com>
 * */
class Servico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('servico_model', 'servico_model');
        if (isset($_SESSION['userLogin'])) {
            
        } else {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        redirect('/admin', 'refresh');
    }

    public function buscar() {
        $user = $_SESSION['userLogin'];
        $nome = (String) $this->input->get('busca');
        $servicos = $this->servico_model->get_servico_by_nome($nome)->result();
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
            //'servicos' => $this->servico_model->get_servico_all()->result()
            'servicos' => $servicos
        ];
        $this->twig->display('servico/listar', $data);
        ;
    }

    // Pagina que lista os servicos
    public function listar() {
        $user = $_SESSION['userLogin'];
        $message_success = $this->session->flashdata('message_success');
        $data = ['base_url' => $this->config->base_url(),
            'message_success' => $message_success,
            'user' => $user,
            'servicos' => $this->servico_model->get_servico_notDeleted()->result()
        ];
        $this->twig->display('servico/listar', $data);
    }

    // Formulario que adiciona novo servico
    public function novo() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'user' => $user,
        ];
        $this->twig->display('servico/novo', $data);
    }

    //Adicona novo servico
    public function adicionar() {
        // Validacoes de campo do formulario        
        $validacao_formulario = $this->validarformularioServico();
        if ($validacao_formulario->run() == TRUE) {
            $valor = str_replace('.', '', $this->input->post('valor'));
            $valor = str_replace(',', '.', $valor);

            // Monta um array com as informacoes da categoria
            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'valor' => $valor,
                'observacoes' => $this->input->post('observacoes'),
                'deletado' => 0
            );
            $this->servico_model->set_servico($dados);
            $this->session->set_flashdata('message_success', 'Servico adicionado com sucesso!');
            redirect('servico/listar', 'refresh');
        } else {
            redirect('servico/novo', 'refresh');
        }
    }

    public function visualizar($servico_id) {
        if ($servico_id != NULL) {
            $servico_id = $servico_id;
        } else {
            $servico_id = $this->uri->segment(3);
        }
        if ($servico_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'user' => $user,
                'servico' => $this->servico_model->get_servico_byid($servico_id)->row()];
            $this->twig->display('servico/visualizar', $data);
        } else {
            redirect('servico/listar', 'refresh');
        }
    }

    // Pagina com o formulario para alterar o servico selecionado
    public function editar($servico_id) {
        if ($servico_id != NULL) {
            $servico_id = $servico_id;
        } else {
            $servico_id = $this->uri->segment(3);
        }
        if ($servico_id != NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'user' => $user,
                'servico' => $this->servico_model->get_servico_byid($servico_id)->row()];
            $this->twig->display('servico/editar', $data);
        } else {
            redirect('servico/listar', 'refresh');
        }
    }

    //Atualiza o servico na base de dados
    public function atualizar() {
        $servico_id = $this->uri->segment(3);
        if ($servico_id != NULL) {
            $validacao_formulario = $this->validarformularioServico();
            if ($validacao_formulario->run() == TRUE) {
                $valor = str_replace('.', '', $this->input->post('valor'));
                $valor = str_replace(',', '.', $valor);

                $dados = array(
                    'titulo' => $this->input->post('titulo'),
                    'descricao' => $this->input->post('descricao'),
                    'valor' => $valor,
                    'observacoes' => $this->input->post('observacoes')
                );
                $this->servico_model->update_servico($dados, array('id_servico' => $servico_id));
                $this->session->set_flashdata('message_success', 'Servico atualizado com sucesso!');
            }
        }
        redirect('servico/listar', 'refresh');
    }

    // Deleta a categoria selecionada na base de dados
    public function deletar() {
        $servico_id = $this->uri->segment(3);
        if ($servico_id != NULL) {
            // Deleta a categotia na base de dadps
            //$this->servico_model->delete_servico(array('id_servico' => $servico_id));
            $this->servico_model->delete_logical_servico(array('id_servico' => $servico_id));
            $this->session->set_flashdata('message_success', 'Servico removido com sucesso!');
        }
        redirect('servico/listar', 'refresh');
    }

    // Validacoes dos campos do formulario
    public function validarformularioServico() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('valor', 'valor', 'required');
        return $this->form_validation;
    }

    public function ajax_servico() {
        $servicos = $this->servico_model->get_servico_notDeleted()->result();
        $data = array();

        foreach ($servicos as $servico) {
            $linha = array();
            $linha[] = $servico->id_servico;
            $linha[] = $servico->titulo;
            $linha[] = $servico->descricao;
            $linha[] = number_format($servico->valor, 2, ',', '.');

            $data[] = $linha;
        }

        $saida = array("data" => $data);

        echo json_encode($saida);
    }

}
