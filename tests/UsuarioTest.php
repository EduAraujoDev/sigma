<?php

class UsuarioTest extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    }

    public function testGetAllUsuarios() {
        
        $dados = array(
                'titulo' => '',
                'descricao' => '',
                'valor' => 0,
                'observacoes' => '',
                'deletado' => 0
            );
        
        $this->CI->load->model('usuario_model');
        $this->CI->usuario_model->set_servico($dados);
        $usuario = $this->CI->usuario_model->get_usuario_notDeleted();
        
        $this->assertEquals(2, count($usuario));
    }
    
}
