<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('usuario_model','usuario_model');
		$this->load->model('perfil_model','perfil_model');

		if(isset($_SESSION['userLogin']))
		{
            if(strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO'){
                redirect('/usuario', 'refresh');
            }
		} else {
			redirect('/','refresh');
		}
	}

	public function index()	
	{
		$data = ['base_url' => $this->config->base_url()];
        $this->twig->display('admin/dashboard_admin', $data);
	}

    public function listarUsuario()
    {
		$data = ['base_url'		=> $this->config->base_url(), 
				 'usuarios' 	=> $this->usuario_model->get_usuario_perfil()->result()];

        $this->twig->display('admin/listarUsuario', $data);        
    }

	public function incluirUsuario()
	{
		$data = ['base_url'		=> $this->config->base_url(), 
				 'tiposPerfis'	=> $this->perfil_model->get_tiposPerfil_all()->result()];

        $this->twig->display('admin/incluirUsuario', $data);		
	}

	public function incluirNovoUsuario()
	{
        $this->form_validation->set_rules('login', 'login', 'required|is_unique[usuario.login]');
        $this->form_validation->set_rules('perfil','perfil','required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        if($this->form_validation->run()==TRUE)
        {
            $dados = array(
                'login' => $this->input->post('login'),
                'senha' => md5($this->input->post('senha1')),
                'TipoPerfil' => $this->input->post('perfil')
                );

            $this->usuario_model->set_usuario($dados);

            $this->session->set_flashdata('usuarioOk','Usuario cadastrado!');

            redirect('admin/listarUsuario','refresh');
        } else {
			redirect('admin/incluirUsuario','refresh');	        
        }          
	}

	public function alterarUsuario()
	{
		$idUsuario = $this->uri->segment(3);

		if($idUsuario <> NULL)
		{
			$data = ['base_url'		=> $this->config->base_url(), 
					 'tiposPerfis'	=> $this->perfil_model->get_tiposPerfil_all()->result(),
					 'usuario' 		=> $this->usuario_model->get_usuario_byid($idUsuario)->row()];

	        $this->twig->display('admin/alterarUsuario', $data);
	    } else {
	    	redirect('admin/listarUsuario','refresh');
	    }
	}

	public function alteraUsuarioSelecionado()
	{
        $this->form_validation->set_rules('perfil', 'perfil','required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        $idUsuario = $this->uri->segment(3);

        if($this->form_validation->run()==TRUE) {
            $dados = array(
                'senha' => md5($this->input->post('senha1')),
                'TipoPerfil' => $this->input->post('perfil')
                );

            $this->usuario_model->update_usuario($dados, array('UsuarioID' => $idUsuario));

            $this->session->set_flashdata('usuarioOk','Usuario alterado!');

            redirect('admin/listarUsuario','refresh');
        } else {
			$data = ['base_url'		=> $this->config->base_url(), 
					 'tiposPerfis'	=> $this->perfil_model->get_tiposPerfil_all()->result(),
					 'usuario' 		=> $this->usuario_model->get_usuario_byid($idUsuario)->row()];

	        $this->twig->display('admin/alterarUsuario', $data);
        }    
	}	

	public function deletarUsuario()
	{
		$idUsuario = $this->uri->segment(3);

        if($idUsuario <> NULL)
		{
			$data = ['base_url'		=> $this->config->base_url(), 
					 'tiposPerfis'	=> $this->perfil_model->get_tiposPerfil_all()->result(),
					 'usuario' 		=> $this->usuario_model->get_usuario_byid($idUsuario)->row()];

	        $this->twig->display('admin/deletarUsuario', $data);
	    } else {
	    	redirect('admin/listarUsuario','refresh');
	    }		
	}

	public function deletarUsuarioSelecionado()
	{
		$idUsuario = $this->uri->segment(3);

        if($idUsuario <> NULL){
            $this->usuario_model->delete_usuario(array('UsuarioID' => $idUsuario));

            $this->session->set_flashdata('usuarioOk','Usuario deletado!');
        } else {
            $this->session->set_flashdata('usuarioOk','Erro ao excluir usuário!');
        }

        redirect('admin/listarUsuario','refresh');
	}	
}