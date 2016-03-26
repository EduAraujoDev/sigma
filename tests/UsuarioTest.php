<?php

class UsuarioTest extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    }

    public function testInsertUsuario() {
        $this->CI->load->model('usuario_model');
        $usuarioAntes = $this->CI->usuario_model->get_usuario_all();
        $totalAntes = (count($usuarioAntes->result()) + 1);
        
        $dados = array(
            'nome' => 'Teste',
            'login' => 'Teste',
            'email' => 'Teste',
            'senha' => 'Teste',
            'deletado' => 0,
            'id_tipo_perfil' => 1
        );

        
        $this->CI->usuario_model->set_usuario($dados);
        $usuario = $this->CI->usuario_model->get_usuario_all();
        $total = count($usuario->result());
        
        $this->assertEquals($totalAntes, $total);
    }

}
