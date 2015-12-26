<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_model extends CI_Model {
	public function get_categoria_all()
    {
        return $this->db->get('produto_categoria');
    }


    public function get_categoria_notDeleted()
    {
        $this->db->where('deletado',0);
        return $this->db->get('produto_categoria');
    }

    public function get_categoria_byid($id=NULL)
    {
        if($id <> NULL)
        {
            $this->db->where('id_categoria',$id);
            $this->db->limit(1);

            return $this->db->get('produto_categoria');
        } else {
            return NULL;
        }
    }

    public function set_categoria($dados=NULL)
    {
        if($dados <> NULL){
            $this->db->insert('produto_categoria',$dados);
        }
    }

    public function update_categoria($dados=NULL,$condicao=NULL)
    {
        if($dados <> null && $condicao <> NULL)
        {
            $this->db->update('produto_categoria',$dados, $condicao);
        }
    }

    public function delete_categoria($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->delete("produto_categoria",$condicao);
        }
    }

    public function delete_logical_categoria($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->update('produto_categoria', array('deletado' => 1), $condicao);
        }
    }    
}