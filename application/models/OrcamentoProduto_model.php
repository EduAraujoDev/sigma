<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoProduto_model extends CI_Model {

    public function insert_orcamentoProduto($orcamento) {
        $this->db->insert('orcamento_produto', $orcamento);     
    }

    public function get_orcamentoProduto_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_orcamento', $id);

            return $this->db->get('orcamento_produto');
        } else {
            return NULL;
        }
    }    
}