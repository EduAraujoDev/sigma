<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produto_model extends CI_Model {

    public function get_produto_all() {
        $this->db->select(' * ');
        $this->db->from('produto');
        $this->db->join('produto_marca', 'produto_marca.id_marca = produto.id_marca');
        $this->db->join('produto_categoria', 'produto_categoria.id_categoria = produto.id_categoria');

        return $this->db->get();
    }

    public function get_produto_notDeleted() {
        $this->db->select(' * ');
        $this->db->from('produto');
        $this->db->join('produto_marca', 'produto_marca.id_marca = produto.id_marca');
        $this->db->join('produto_categoria', 'produto_categoria.id_categoria = produto.id_categoria');
        $this->db->where('produto.deletado', 0);

        return $this->db->get();
    }

    public function get_produto_by_nome($nome) {
        $this->db->like('nome', $nome);
        return $this->db->get('produto');
    }

    public function get_produto_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->select(' * ');
            $this->db->from('produto');
            $this->db->join('produto_marca', 'produto_marca.id_marca = produto.id_marca');
            $this->db->join('produto_categoria', 'produto_categoria.id_categoria = produto.id_categoria');
            $this->db->where('id_produto', $id);

            return $this->db->get();
        } else {
            return NULL;
        }
    }

    public function set_produto($dados = NULL) {
        if ($dados <> NULL) {
            $this->db->insert('produto', $dados);
        }
    }

    public function update_produto($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            $this->db->update('produto', $dados, $condicao);
        }
    }

    public function delete_produto($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("produto", $condicao);
        }
    }

    public function delete_logical_produto($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('produto', array('deletado' => 1), $condicao);
        }
    }

}
