<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DespesaStatus_model extends CI_Model {
    
    public function get_despesastatus_all() {
        return $this->db->get('despesa_status');
    }

    public function get_despesastatus_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('despesa_status');
    }

    public function get_despesastatus_by_nome($nome) {
        $this->db->like('titulo', $nome);
        return $this->db->get('despesa_status');
    }

    public function get_despesastatus_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_categoria', $id);
            $this->db->limit(1);

            return $this->db->get('despesa_status');
        } else {
            return NULL;
        }
    }

    public function set_despesastatus($dados = NULL) {
        if ($dados <> NULL) {
            $this->db->insert('despesa_status', $dados);
        }
    }

    public function update_despesastatus($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('despesa_status', $dados, $condicao);
        }
    }

    public function delete_despesastatus($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("despesa_status", $condicao);
        }
    }

    public function delete_logical_despesastatus($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('despesa_status', array('deletado' => 1), $condicao);
        }
    }
    
}
