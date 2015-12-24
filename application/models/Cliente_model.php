<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function get_cliente_all() {
        return $this->db->get('cliente');
    }

    public function get_cliente_by_id($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->limit(1);
        return $this->db->get('cliente');
    }

    public function get_cliente_by_cpf_cnpj($cpf_cnpj) {
        $this->db->like('cpf_cnpj', $cpf_cnpj);
        return $this->db->get('cliente');
    }

    public function insert_cliente($cliente) {
        $this->db->insert('cliente', $cliente);
    }

    public function update_cliente($cliente, $id_cliente) {
        $this->db->update('cliente', $cliente, array('id_cliente' => $id_cliente));
    }

    public function delete_cliente($id_cliente) {
        $this->db->delete('cliente', array('id_cliente' => $id_cliente));
    }

    public function delete_logical_cliente($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->update('cliente', array('deletado' => 1), $condicao);
        }
    }
}