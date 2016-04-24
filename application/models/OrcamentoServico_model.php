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

    public function get_orcamentoServico_countbyid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_orcamento', $id);

            $query = $this->db->get('orcamento_servico');

            return $query->num_rows();
        } else {
            return NULL;
        }
    }

    public function delete_orcamentoServico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("orcamento_servico", $condicao);
        }
    }    

    public function delete_logical_orcamentoServico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('orcamento_servico', array('deletado' => 1), $condicao);
        }
    }    
}