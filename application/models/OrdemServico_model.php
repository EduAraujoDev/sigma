<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServico_model extends CI_Model {

    public function get_ordemservico_all() {
        return $this->db->get('ordem_servico_cabecalho');
    }
    
    public function get_ordemservico_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('ordem_servico_cabecalho');
    }

    public function insert_ordemservico($ordemServico) {
        $this->db->insert('ordem_servico_cabecalho', $ordemServico);

        $insert_id = $this->db->insert_id();

        return  $insert_id;        
    }

    public function get_ordemservico_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_ordem_servico', $id);
            $this->db->limit(1);

            return $this->db->get('ordem_servico_cabecalho');
        } else {
            return NULL;
        }
    }

    public function update_ordemservico($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('ordem_servico_cabecalho', $dados, $condicao);
        }
    }

    public function delete_logical_ordemservico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('ordem_servico_cabecalho', array('deletado' => 1), $condicao);
        }
    }
}