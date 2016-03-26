<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento_model extends CI_Model {

    public function get_orcamento_all() {
        return $this->db->get('orcamento_cabecalho');
    }
    
    public function get_orcamento_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('orcamento_cabecalho');
    }

    public function insert_orcamento($orcamento) {
        $this->db->insert('orcamento_cabecalho', $orcamento);

        $insert_id = $this->db->insert_id();

        return  $insert_id;        
    }
}