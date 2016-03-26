<?php

class ServicoTest extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    }

    public function testServico() {
        $this->CI->load->model('servico_model');
        $servicoAntes = $this->CI->servico_model->get_servico_all();
        $totalAntes = (count($servicoAntes->result()) + 1);



        $dados = array(
            'titulo' => 'Servico',
            'descricao' => 'Servico auto peça',
            'valor' => 1000.00,
            'observacoes' => 'Servico',
            'deletado' => 0
        );
        
        
        $this->CI->servico_model->set_servico($dados);
        $servico = $this->CI->servico_model->get_servico_all();
        $total = (count($servico->result())  );
        $this->assertEquals($totalAntes,$total);
    }

}
