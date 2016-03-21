<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfil_model extends CI_Model {

    public function get_tiposPerfil_all() {
        $this->db->where('deletado', 0);
        return $this->db->get('tipo_perfil');
    }

    public function get_perfil_byid($id = NULL) {
        if ($id <> NULL) {
            $this->db->where('id_tipo_perfil', $id);
            $this->db->limit(1);
            return $this->db->get('tipo_perfil');
        } else {
            return NULL;
        }
    }

}
