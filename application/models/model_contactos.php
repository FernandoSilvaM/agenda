<?php

class Model_contactos extends CI_Model{
    
    function insertar($data){
        $this->db->insert('contactos',$data);
    }
    
    function obtenerTodo(){
        $query=$this->db->get('contactos');
        return $query->result();
    }
}
?>