<?php
class Contactos extends CI_Controller{
    
    /**
     * Funcion contructor de la clase
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
    public function index(){
        $data['titulo']='Pagina principal';
        $data['dataContactos']= $this->model_contactos->obtenerTodo();
       
        
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
    public function agregar(){
        $data['titulo']='Agregar Nuevo Contacto';
        $this->load->view('plantilla/header',$data);
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
    public function agregarContacto(){
        $this->form_validation->set_rules('nnombre','Nombre','required');
        $this->form_validation->set_rules('ndireccion','Direccion','required');
        $this->form_validation->set_rules('ntelefono','Telefono','required');
        
        if($this->form_validation->run()==FALSE){
            
            $data['titulo']='Agregar Nuevo Contacto Probando';
            $this->load->view('plantilla/header',$data);
            $this->load->view('contactos/agregar');
            $this->load->view('plantilla/footer');
        }
        else{
            $data=array(
              'Nombre'=>$this->input->post('nnombre'),
              'Direccion'=>$this->input->post('ndireccion'),
              'Telefono'=>$this->input->post('ntelefono')                
            );                    
            $this->model_contactos->insertar($data);
            redirect(base_url(), 'Contactos/');
    }
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
     public function borrar(){
        $data['titulo']='Eliminar Contacto';
        $this->load->view('plantilla/header',$data);
        $this->load->view('contactos/eliminar');
        $this->load->view('plantilla/footer');
         
        $id=$this->input->post('nnombre');
        $this->model_contactos->eliminar($id);  
    }
    
    /**
     * Funcion para editar datos de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function editar(){
        $data['id']=$this->uri->segment(3);
        $data['contacto']=$this->model_contactos->obtenerContacto($data['id']);
        
        $data['titulo']='Editar Contacto';
        $this->load->view('plantilla/header',$data);
        $this->load->view('contactos/actualizar',$data);
        $this->load->view('plantilla/footer');
        
    }
    /**
     * Funcion para actualizar los datos de la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
    public function actualizar(){
        $data=array(
              'Nombre'=>$this->input->post('nnombre'),
              'Direccion'=>$this->input->post('ndireccion'),
              'Telefono'=>$this->input->post('ntelefono')                
            );        
        $this->model_contactos->actualizarDatos($this->uri->segment(3),$data);
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
        public function buscar(){
        $data['id']=$this->input->post('nnombre');
        $data['contacto']=$this->model_contactos->obtenerContacto($data['id']);  
        
        $data['titulo']='Editar Contacto';
        $this->load->view('plantilla/header',$data);
        $this->load->view('contactos/buscar',$data);
        $this->load->view('plantilla/footer');
    }
}
?>