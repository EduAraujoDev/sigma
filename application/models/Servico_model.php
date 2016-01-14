<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servico_model extends CI_Model {

    public function get_servico_all() {
        return $this->db->get('servico');
    }

    public function get_servico_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('servico');
    }

    public function get_servico_by_nome($nome) {
        $this->db->like('titulo', $nome);
        return $this->db->get('servico');
    }

    public function get_servico_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_servico', $id);
            $this->db->limit(1);

            return $this->db->get('servico');
        } else {
            return NULL;
        }
    }

    public function set_servico($dados = NULL) {
        if ($dados <> NULL) {
            $this->db->insert('servico', $dados);
        }
    }

    public function update_servico($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('servico', $dados, $condicao);
        }
    }

    public function delete_servico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("servico", $condicao);
        }
    }

    public function delete_logical_servico($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('servico', array('deletado' => 1), $condicao);
        }
    }

}
