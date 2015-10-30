<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    public function get_usuario_bypwd($usuario=NULL,$senha=NULL)
    {
        if($usuario <> null && $senha<>null)
        {
            $this->db->where('login', $usuario);
            $this->db->where('senha', $senha);
            $this->db->limit(1);

            return $this->db->get('usuario');
        } else {
            return NULL;
        }
    }

    public function get_usuario_byid($id=NULL)
    {
        if($id <> NULL)
        {
            $this->db->where('id_usuario',$id);
            $this->db->limit(1);

            return $this->db->get('usuario');
        } else {
            return NULL;
        }
    }

    public function get_usuario_all()
    {
        return $this->db->get('usuario');
    }

    public function get_usuario_perfil()
    {
        $this->db->select('id_usuario, login, titulo');
        $this->db->from('usuario');
        $this->db->join('tipo_perfil', 'id_tipo_perfil = id_tipo_perfil');
        return $this->db->get();
    }

    public function set_usuario($dados=NULL)
    {
        if($dados <> NULL){
            $this->db->insert('usuario',$dados);
        }
    }

    public function update_usuario($dados=NULL,$condicao=NULL)
    {
        if($dados <> null && $condicao <> NULL)
        {
            $this->db->update('usuario',$dados, $condicao);
        }
    }

    public function delete_usuario($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->delete("usuario",$condicao);
        }
    }
}