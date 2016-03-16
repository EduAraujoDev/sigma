<?php

class UsuarioTest extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    }

    public function testGetAllUsuarios() {
        $this->CI->load->model('usuario_model');
        $usuario = $this->CI->usuario_model->get_usuario_notDeleted();
        $this->assertEquals(1, count($usuario));
    }

}
