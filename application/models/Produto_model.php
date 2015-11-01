<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends CI_Model {
	public function get_produto_all()
    {
        return $this->db->get('tipo_perfil');
    }
}