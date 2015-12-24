<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marca_model extends CI_Model {
	public function get_marca_all()
    {
        return $this->db->get('produto_marca');
    }

    public function get_marca_byid($id=NULL)
    {
        if($id <> NULL)
        {
            $this->db->where('id_marca',$id);
            $this->db->limit(1);

            return $this->db->get('produto_marca');
        } else {
            return NULL;
        }
    }

    public function set_marca($dados=NULL)
    {
        if($dados <> NULL){
            $this->db->insert('produto_marca',$dados);
        }
    }

    public function update_marca($dados=NULL,$condicao=NULL)
    {
        if($dados <> null && $condicao <> NULL)
        {
            $this->db->update('produto_marca',$dados, $condicao);
        }
    }

    public function delete_marca($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->delete("produto_marca",$condicao);
        }
    }  	

    public function delete_logical_marca($condicao=NULL)
    {
        if($condicao <> NULL)
        {
            $this->db->update('produto_marca', array('deletado' => 1), $condicao);
        }
    }    
}