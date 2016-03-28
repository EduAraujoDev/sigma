<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DespesaGeral_model extends CI_Model {

    public function get_despesageral_all() {
        return $this->db->get('despesa');
    }

    public function get_despesageral_notDeleted() {
        $this->db->select('despesa.id_despesa,despesa.data_criacao,despesa.data_vencimento,despesa.data_pagamento,despesa.total,despesa_status.titulo as status, despesa_categoria.titulo as categoria');
        $this->db->from('despesa');
        $this->db->join('despesa_status', 'despesa_status.id_status = despesa.id_despesa');
        $this->db->join('despesa_categoria', 'despesa_categoria.id_categoria = despesa.id_despesa');
        $this->db->where('despesa.deletado', 0);
        return $this->db->get();
    }

    public function get_despesageral_byid($id_despesa) {
        $this->db->where('id_despesa', $id_despesa);
        $this->db->limit(1);
        return $this->db->get('despesa');
    }

    public function get_despesageral_count_notDeleted() {
        $this->db->where('deletado', 0);
        $db_result = $this->db->get('despesa');
        return $db_result->num_rows();
    }

    public function insert_despesageral($despesa) {
        $this->db->insert('despesa', $despesa);
    }

    public function update_despesageral($despesa, $id_despesa) {
        $this->db->update('despesa', $despesa, array('id_despesa' => $id_despesa));
    }

    public function delete_despesageral($id_despesa) {
        $this->db->delete('despesa', array('id_despesa' => $id_despesa));
    }

    public function delete_logical_despesageral($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('despesa', array('deletado' => 1), $condicao);
        }
    }

}
