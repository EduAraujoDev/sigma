<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	public function get_tiposPerfis_all()
    {
        return $this->db->get('TipoPerfis');
    }
}