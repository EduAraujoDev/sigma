<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServicoStatus_model extends CI_Model {

    public function get_ordemServicoStatus_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('ordem_servico_status');
    }
}