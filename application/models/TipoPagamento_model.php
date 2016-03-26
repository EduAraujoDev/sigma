<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPagamento_model extends CI_Model {

    public function get_tipoPagamento_notDeleted() {
        $this->db->where('deletado', 0);
        return $this->db->get('tipo_pagamento');
    }	
}