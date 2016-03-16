<?php

class DoisNumerosTeste extends PHPUnit_Framework_TestCase {
    
    public $resultado;
    
    public function somar() {
        $this->resultado = new TesteDoisNumeros(5 + 5);
    }
    
    public function somarTeste() {
        $valor = $this->resultado->somar();
        $this->assertTrue($valor == 10);
    }
}

?>