<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoProduto_model extends CI_Model {

    public function insert_orcamentoProduto($orcamento) {
        $this->db->insert('orcamento_produto', $orcamento);     
    }
}