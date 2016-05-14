<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServicoProduto_model extends CI_Model {

    public function insert_ordemServicoProduto($ordemServicoProduto) {
        $this->db->insert('ordem_servico_produto', $orcamento);     
    }

    public function get_ordemServicoProduto_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_ordem_servico', $id);

            return $this->db->get('ordem_servico_produto');
        } else {
            return NULL;
        }
    }

    public function delete_ordemServicoProduto($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->delete("ordem_servico_produto", $condicao);
        }
    }    

    public function delete_logical_ordemServicoProduto($condicao = NULL) {
        if ($condicao <> NULL) {
            $this->db->update('ordem_servico_produto', array('deletado' => 1), $condicao);
        }
    }  
}