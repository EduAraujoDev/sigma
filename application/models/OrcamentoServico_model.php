<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoServico_model extends CI_Model {

    public function insert_orcamentoServico($orcamento) {
        $this->db->insert('orcamento_servico', $orcamento);     
    }

    public function get_orcamentoServico_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_orcamento', $id);

            return $this->db->get('orcamento_servico');
        } else {
            return NULL;
        }
    }    
}