<?php

class Contactos extends CI_Controller {

    /**
     * Funcion constructor de la clase
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    function __construct() {
        parent::__construct();
        $this->load->model('model_contactos');
    }

    /**
     * Funcion inicial de la clase
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function index() {
        $data['titulo'] = 'Pagina principal';
        $data['dataContactos'] = $this->model_contactos->obtenerTodo();
        $data['dataContacto'] = $this->model_contactos->obtenerTodo();

        $this->load->view('plantilla/header', $data);
        $this->load->view('contactos/index', $data);
        $this->load->view('plantilla/footer');
    }

    /**
     * Funcion para cargar la vista de agregar nuevo contacto
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function agregar() {
        $data['titulo'] = 'Agregar Nuevo Contacto';
        $this->load->view('plantilla/header', $data);
        $this->load->view('contactos/agregar');
        $this->load->view('plantilla/footer');
    }

    /**
     * Funcion para rectificar que los campos esten completamente diligenciados, capturando
     * por medio del metodo post lo que se ingrese en las claves que se le
     * asginaron a los campos de la base de datos, dirijiendolo al modelo_contactos a la 
     * funcion insertar para que haga el proceso de guardarlos en la tabla contactos de la base de datos.
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function agregarContacto() {
        $this->form_validation->set_rules('nnombre', 'con_nombre', 'required');
        $this->form_validation->set_rules('napellido', 'con_apellido', 'required');
        $this->form_validation->set_rules('ndireccion', 'con_direccion', 'required');
        $this->form_validation->set_rules('ntelefono', 'con_telefono', 'required|is_unique[contacto.con_telefono]');
        $this->form_validation->set_rules('ncorreo', 'con_email', 'required|is_unique[contacto.con_email]');
        $this->form_validation->set_message('is_unique', '<font color="#FF0000">El %s ingresado ya existe.</font>');

        if ($this->form_validation->run() == FALSE) {

            $data['titulo'] = 'Agregar Nuevo Contacto';
            $this->load->view('plantilla/header', $data);
            $this->load->view('contactos/agregar');
            $this->load->view('plantilla/footer');
            if ($this->form_validation->run() == TRUE) {
                $this->load->model('model_contactos');
            }
        } else {
            $data = array(
                'con_nombre' => $this->input->post('nnombre'),
                'con_apellido' => $this->input->post('napellido'),
                'con_direccion' => $this->input->post('ndireccion'),
                'con_telefono' => $this->input->post('ntelefono'),
                'con_email' => $this->input->post('ncorreo'),
                'est_id' => $this->input->post('estado')
            );
            $this->model_contactos->insertar($data);
            redirect(base_url(), 'Contactos/');
        }
    }

    public function is_unique() {
        $this->db->limit(1)->where('con_telefono', 'con_email');
        $query = $this->db->get('contacto');
        return $query->num_rows() === 0;
    }

    /**
     * Funcion para eliminar un contacto llevandolo al model_contactos y luego a la funcion eliminar
     * para que haga el proceso de eliminacion de contacto
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function borrar($pBorrar) {
        $dataBorrar['titulo'] = 'Eliminar Contacto';
        $this->load->view('plantilla/header', $dataBorrar);
        $this->load->view('plantilla/footer');

        $this->model_contactos->eliminar($pBorrar);
        redirect(base_url(), 'Contactos/');
    }

    /**
     * Funcion que carga los datos de la tabla contactos llevandolo al model_contactos y luego 
     * a la funcion obtenerContacto para que los muestre en la vista actualizar
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function editar($pIdContacto) {
        $dataVista = array(
            'infoContacto' => $this->model_contactos->obtenerContacto($pIdContacto),
            'titulo' => "Editar Contacto"
        );
        $this->load->view('plantilla/header', $dataVista);
        $this->load->view('contactos/actualizar', $dataVista);
        $this->load->view('plantilla/footer');
    }

    /**
     * Funcion para actualizar los datos de la tabla contactos, tomando los nuevos datos 
     * que se ingresan para guardar y actualizar en la base de datos 
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function actualizar() {
        $dataActualizar = array(
            'con_nombre' => $this->input->post('nnombre', TRUE),
            'con_apellido' => $this->input->post('napellido', TRUE),
            'con_direccion' => $this->input->post('ndireccion', TRUE),
            'con_telefono' => $this->input->post('ntelefono', TRUE),
            'con_email' => $this->input->post('ncorreo', TRUE),
            'est_id' => $this->input->post('estado', TRUE)
        );
        $valorActualizar = $this->model_contactos->actualizarDatos($this->input->post('idUsuario', TRUE), $dataActualizar);
        redirect(base_url(), 'Contactos/');
    }

    /**
     * Funcion para buscar los contactos de la tabla
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function buscar() {
        $dataBuscar = array();

        $datosBuscar = $this->input->post('datosBuscar', TRUE);

        if ($datosBuscar) {
            $result = $this->model_contactos->buscarContacto($datosBuscar);
            if ($result != FALSE) {
                $dataBuscar = array('result' => $result);
            } else {
                $dataBuscar = array('result' => '');
            }
        } else {
            $dataBuscar = array('result' => '');
        }
        $dataBuscar['titulo'] = 'Buscar Contacto';
        $this->load->view('plantilla/header', $dataBuscar);
        $this->load->view('contactos/buscar', $dataBuscar);
        $this->load->view('plantilla/footer');
    }

}
