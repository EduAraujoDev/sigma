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
        $this->load->model('cliente_model', 'cliente_model');
        $this->load->model('servico_model', 'servico_model');
        $this->load->model('produto_model', 'produto_model');
        $this->load->model('fornecedor_model', 'fornecedor_model');
        $this->load->model('DespesaGeral_model', 'despesageral_model');

        if (isset($_SESSION['userLogin'])) {
            
        } else {
            redirect('/', 'refresh');
        }
    }

    // Pagina inicial para usuario administrador
    public function index() {
        $user = $_SESSION['userLogin'];
        //Grafico Status de Despesas
        $result_des_chart = $this->getdes_chart();
        $return_des_chart = $this->create_des_chart($result_des_chart);
        $des_chart = $return_des_chart['des_chart'];
        $des_label = $return_des_chart['des_label'];

        //Aprovação de Orçamentos
        $result_orc_chart = $this->getorc_chart();
        $return_orc_chart = $this->create_orc_chart($result_orc_chart);
        $orc_chart = $return_orc_chart['orc_chart'];
        $orc_label = $return_orc_chart['orc_label'];

        //Status de Orçamentos
        $result_orc_barchart = $this->getorc_brchart();
        $return_orc_barchart = $this->create_orc_barchart($result_orc_barchart);
        $orc_barchart = $return_orc_barchart['orc_barchart'];
        $orc_barlabel = $return_orc_barchart['orc_barlabel'];

        //Status de Ordem de Serviço
        $result_ors_barchart = $this->getors_brchart();
        $return_ors_barchart = $this->create_ors_barchart($result_ors_barchart);
        $ors_barchart = $return_ors_barchart['ors_barchart'];
        $ors_barlabel = $return_ors_barchart['ors_barlabel'];

        $data = array(
            'base_url' => $this->config->base_url(),
            'qntCliente' => $this->cliente_model->get_cliente_count_notDeleted(),
            'qntServico' => $this->servico_model->get_servico_count_notDeleted(),
            'qntProduto' => $this->produto_model->get_produto_count_notDeleted(),
            'qntFornecedor' => $this->fornecedor_model->get_fornecedor_count_notDeleted(),
            'qntDespesa' => $this->despesageral_model->get_despesageral_count_notDeleted(),
            'user' => $user,
            'des_chart' => $des_chart,
            'des_label' => $des_label,
            'orc_chart' => $orc_chart,
            'orc_label' => $orc_label,
            'orc_barchart' => $orc_barchart,
            'orc_barlabel' => $orc_barlabel,
            'ors_barchart' => $ors_barchart,
            'ors_barlabel' => $ors_barlabel,
        );
        $this->twig->display('admin/dashboard_admin', $data);
    }

    // Pagina que lista os usuarios
    public function listarUsuario() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
            'usuarios' => $this->usuario_model->get_usuario_perfil()->result()];

        $this->twig->display('admin/listarUsuario', $data);
    }

    // Pagina com o formulario para inclusao de novo usuario
    public function incluirUsuario() {
        $user = $_SESSION['userLogin'];
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
            $user = $_SESSION['userLogin'];
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
            $user = $_SESSION['userLogin'];
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
        $user = $_SESSION['userLogin'];

        if ($idUsuario <> NULL) {
            $user = $_SESSION['userLogin'];
            $data = ['base_url' => $this->config->base_url(),
                'tiposPerfis' => $this->perfil_model->get_tiposPerfil_all()->result(),
                'usuario' => $this->usuario_model->get_usuario_byid($idUsuario)->row(),
                'user' => $user,
            ];
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

    public function getdes_chart() {
        $sql = "SELECT
	DS.titulo AS STATUS,
	CONVERT((COUNT(DISTINCT D.id_despesa)/(SELECT COUNT(*) FROM despesa WHERE data_criacao BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() AND deletado = 0))*100,SIGNED INTEGER) AS Total
FROM
	despesa AS D
	INNER JOIN despesa_status AS DS ON D.id_status = DS.id_status
WHERE
	(D.data_criacao BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW())
	AND D.deletado = 0
GROUP BY
	DS.titulo";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create_des_chart($result_des_chart) {
        $des_chart = [];
        $des_label = [];
        foreach ($result_des_chart as $r) {
            if ($r->STATUS == 'Aberta') {
                $color = 'rgb(0, 192, 239)';
            } elseif ($r->STATUS == 'Paga') {
                $color = 'rgb(0, 166, 90)';
            } else {
                $color = 'rgb(243, 156, 18)';
            }

            $des_chart[] = ['value' => $r->Total, 'color' => $color, 'label' => $r->STATUS];
            $des_label[] = ['color' => $color, 'nome' => $r->STATUS . ' - ' . $r->Total . '%'];
        }

        return ['des_chart' => $des_chart, 'des_label' => $des_label];
    }

    public function getorc_chart() {
        $sql = "SELECT
	Z.Status,
	CONVERT(IFNULL((IFNULL(COUNT(DISTINCT Z.id_orcamento),0)/(SELECT COUNT(*) FROM orcamento_cabecalho WHERE YEAR(data_criacao)*100+MONTH(data_criacao) = YEAR(NOW())*100+MONTH(NOW())))*100,0),SIGNED INTEGER) AS Total
FROM
	(
		SELECT
			OC.id_orcamento,
			CASE WHEN OS.titulo = 'Aprovado' THEN 'Aprovado' ELSE 'Não aprovado' END AS Status
		FROM
			orcamento_status AS OS
			INNER JOIN orcamento_cabecalho AS OC ON OS.id_status = OC.id_status
		WHERE
			YEAR(OC.data_criacao)*100+MONTH(OC.data_criacao) = YEAR(NOW())*100+MONTH(NOW())
			AND IFNULL(OC.deletado,0) = 0	
	) AS Z
GROUP BY
	Z.Status";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create_orc_chart($result_orc_chart) {
        $orc_chart = [];
        $orc_label = [];
        foreach ($result_orc_chart as $r) {
            if ($r->Status == 'Aprovado') {
                $color = 'rgb(20, 97, 204)';
            } else {
                $color = 'rgb(221, 75, 57)';
            }
            $orc_chart[] = ['value' => $r->Total, 'color' => $color, 'label' => $r->Status];
            $orc_label[] = ['color' => $color, 'nome' => $r->Status . ' - ' . $r->Total . '%'];
        }
        return ['orc_chart' => $orc_chart, 'orc_label' => $orc_label];
    }

    public function getorc_brchart() {
        $sql = "SELECT
	OS.titulo AS STATUS,
	COUNT(DISTINCT OC.id_orcamento) AS Total
FROM
	orcamento_cabecalho AS OC
	INNER JOIN orcamento_status AS OS  ON OC.id_status = OS.id_status
WHERE
	(OC.data_criacao BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() OR OC.data_criacao IS NULL)
	AND IFNULL(OC.deletado,0) = 0
GROUP BY
	OS.titulo";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create_orc_barchart($result_orc_barchart) {
        $orc_chart = [];
        $orc_label = [];
        foreach ($result_orc_barchart as $r) {
            if ($r->STATUS == 'Aberto') {
                $orc_label[] = 'Aberto';
            } else if ($r->STATUS == 'Reprovado') {
                $orc_label[] = 'Reprovado';
            } else if ($r->STATUS == 'Aprovado') {
                $orc_label[] = 'Aprovado';
            } else if ($r->STATUS == 'Reprovado e Pago') {
                $orc_label[] = 'Repr Pag';
            } else if ($r->STATUS == 'Reprovado e Pendente Pagamento') {
                $orc_label[] = 'Repr Pend Pag';
            } else {
                $orc_label[] = 'Repr N Pag';
            }

            $orc_chart[] = doubleval($r->Total);
        }
        return ['orc_barchart' => $orc_chart, 'orc_barlabel' => $orc_label];
    }

    public function getors_brchart() {
        $sql = "SELECT
	OS.titulo AS STATUS,
	COUNT(DISTINCT OC.id_ordem_servico) AS Total
FROM
	ordem_servico_cabecalho AS OC
	INNER JOIN ordem_servico_status AS OS ON OC.id_status = OS.id_status
WHERE
	(OC.data_criacao BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() OR OC.data_criacao IS NULL)
	AND IFNULL(OC.deletado,0) = 0
GROUP BY
	OS.titulo";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create_ors_barchart($result_ors_barchart) {
        $orc_chart = [];
        $orc_label = [];
        foreach ($result_ors_barchart as $r) {
            if ($r->STATUS == 'Aberta') {
                $orc_label[] = 'Aberta';
            } else if ($r->STATUS == 'Finalizada e Paga') {
                $orc_label[] = 'Final Pag';
            } else if ($r->STATUS == 'Finalizada e Pendente de Pagam') {
                $orc_label[] = 'Final Pend Pag';
            } else {
                $orc_label[] = 'Final N Pag';
            }
            $orc_chart[] = doubleval($r->Total);
        }
        return ['ors_barchart' => $orc_chart, 'ors_barlabel' => $orc_label];
    }

}
