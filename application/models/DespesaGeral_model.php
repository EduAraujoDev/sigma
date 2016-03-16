<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DespesaGeral_model extends CI_Model {
    
    public function get_despesageral_all() {
        return "";
    }
    
    public function get_despesageral_notDeleted() {
        return "";
    }
    
    public function get_despesageral_by_nome($nome) {
        return "";
    }
    
    public function get_despesageral_byid($id = NULL) {
        if($id <> NULL) {
            return "";
        } else {
            return NULL;
        }
    }
    
    public function set_despesageral($dados = NULL) {
        if ($dados <> NULL) {
            //
        }
    }
    
    public function update_despesageral($dados = NULL, $condicao = NULL) {
        if ($dados <> null && $condicao <> NULL) {
            //
        }
    }
    
    public function delete_despesageral($condicao = NULL) {
        if ($condicao <> NULL) {
            //
        }
    }
    
    public function delete_logical_despesageral($condicao = NULL) {
        if ($condicao <> NULL) {
            //
        }
    }
    
}
