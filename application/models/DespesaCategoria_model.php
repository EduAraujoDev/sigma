<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DespesaCategoria_model extends CI_Model {
    
    public function get_despesacategoria_all() {
        return $this->db->get('despesa_categoria');
    }

    public function get_despesacategoria_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('despesa_categoria');
    }

    public function get_despesacategoria_by_nome($nome) {
        $this->db->like('titulo', $nome);
        return $this->db->get('despesa_categoria');
    }

    public function get_despesacategoria_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_categoria', $id);
            $this->db->limit(1);

            return $this->db->get('despesa_categoria');
        } else {
            return NULL;
        }
    }

    public function set_despesacategoria($dados = NULL) {
        if ($dados <> NULL) {
            $this->db->insert('despesa_categoria', $dados);
        }
    }

    public function update_despesacategoria($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('despesa_categoria', $dados, $condicao);
        }
    }

    public function delete_despesacategoria($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("despesa_categoria", $condicao);
        }
    }

    public function delete_logical_despesacategoria($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('despesa_categoria', array('deletado' => 1), $condicao);
        }
    }
    
}
