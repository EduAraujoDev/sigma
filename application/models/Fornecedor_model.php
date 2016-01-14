<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fornecedor_model extends CI_Model {

    public function get_fornecedor_all() {
        return $this->db->get('fornecedor');
    }

    public function get_fornecedor_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('fornecedor');
    }

    public function get_fornecedor_by_cpf_cnpj($cpf_cnpj) {
        $this->db->like('cpf_cnpj', $cpf_cnpj);
        return $this->db->get('fornecedor');
    }

    public function get_fornecedor_by_nome($nome) {
        $this->db->like('nome', $nome);
        return $this->db->get('fornecedor');
    }

    public function get_fornecedor_by_nome_fantasia($nome_fantasia) {
        $this->db->like('nome_fantasia', $nome_fantasia);
        return $this->db->get('fornecedor');
    }

    public function get_fornecedor_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_fornecedor', $id);
            $this->db->limit(1);

            return $this->db->get('fornecedor');
        } else {
            return NULL;
        }
    }

    public function set_fornecedor($dados = NULL) {
        if ($dados <> NULL) {
            $this->db->insert('fornecedor', $dados);
        }
    }

    public function update_fornecedor($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('fornecedor', $dados, $condicao);
        }
    }

    public function delete_fornecedor($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("fornecedor", $condicao);
        }
    }

    public function delete_logical_fornecedor($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('fornecedor', array('deletado' => 1), $condicao);
        }
    }

}
