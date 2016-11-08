<?php
     
class Model_contactos extends CI_Model{
    /**
     * Funcion para insertar los datos en la tabla contactos de la base de datos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function insertar($data){
        $this->db->insert('contactos',$data);
    }
    
    /**
     * Funcion para obtener todos los datos de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function obtenerTodo(){
        $query=$this->db->get('contactos');
        
        $valorRetorno = $query->result();
        
        return $valorRetorno;
        
        
    }
}
?>