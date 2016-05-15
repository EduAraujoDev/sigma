<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServicoServico_model extends CI_Model {

	public function insert_orcamentoServicoServico($ordemServicoServico) {
        $this->db->insert('ordem_servico_servico', $ordemServicoServico);     
    }

    public function get_orcamentoServicoServico_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_ordem_servico', $id);

            return $this->db->get('ordem_servico_servico');
        } else {
            return NULL;
        }
    }

    public function delete_orcamentoServicoServico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("ordem_servico_servico", $condicao);
        }
    }    

    public function delete_logical_orcamentoServicoServico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('ordem_servico_servico', array('deletado' => 1), $condicao);
        }
    }  
}