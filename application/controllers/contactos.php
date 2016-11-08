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
     * asginaron a los campos de la base de datos, dirijiendolo a modelo_contactos a la 
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
}
?>