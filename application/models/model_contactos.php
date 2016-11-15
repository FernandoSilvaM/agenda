<?php

class Model_contactos extends CI_Model {

    /**
     * Funcion para insertar los datos en la tabla contactos de la base de datos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function insertar($data) {
        $this->db->insert('contactos', $data);
    }

    /**
     * Funcion para obtener todos los datos de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function obtenerTodo() {
        $query = $this->db->get('contactos');

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
    function eliminar($pBorrar) {
        $this->db->delete('contactos', array('Id' => $pBorrar));
    }

    /**
     * Funcion para buscar datos en la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function obtenerContacto($pIdEditar) {
        $this->db->where('id', $pIdEditar);
        $query = $this->db->get('contactos');
        return $query->result();
    }

    /**
     * Funcion para actualizar los datos de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function actualizarDatos($pIdContacto, $pDataActualizar) {

        $this->db->where('id', $pIdContacto);
        $query = $this->db->update('contactos', $pDataActualizar);
        return $query;
    }

    /**
     * Funcion para consultar los datos de la tabla contactos por el campo nombre
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function buscarContacto($datosBuscar) {
        $this->db->like('Nombre', $datosBuscar);
        $datosBuscar = $this->db->get('contactos');
        if ($datosBuscar->num_rows() > 0) {
            return $datosBuscar;
        } else {
            return FALSE;
        }
    }

}

?>