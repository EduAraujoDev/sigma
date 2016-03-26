<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoStatus_model extends CI_Model {

    public function get_orcamentoStatus_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('orcamento_status');
    }	
}