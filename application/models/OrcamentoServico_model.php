<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoServico_model extends CI_Model {

    public function insert_orcamentoServico($orcamento) {
        $this->db->insert('orcamento_servico', $orcamento);     
    }
}