<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfil_model extends CI_Model {

    public function get_tiposPerfil_all() {
        $this->db->where('deletado', 0);
        return $this->db->get('tipo_perfil');
    }

}
