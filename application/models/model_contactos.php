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
    
    /**
     * Funcion para eliminar el dato seleccionado de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function eliminar($id){
        $this->db->delete('contactos',array('Nombre'=>$id));
    }
    
    /**
     * Funcion para buscar datos en la tabla contactos **POR REVISAR Y ARREGLAR**
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function obtenerContacto($id){
        $this->db->where('id', $id);
        $query=$this->db->get('contactos');
    }
    
    /**
     * Funcion para actualizar los datos de la tabla contactos **POR REVISAR Y ARREGLAR**
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function actualizarDatos($id,$data){
        $datos=array(
              'Nombre'=>$data['nnombre'],
              'Direccion'=>$data['ndireccion'],
              'Telefono'=>$data['ntelefono']  
        );
        $this->db->where('id',$id);
        $query=$this->db->update('contactos',$datos);
        
    }

    }
?>