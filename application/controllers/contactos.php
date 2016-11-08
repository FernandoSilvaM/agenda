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
        $this->load->model('Model_contactos');
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
        $data['titulo']='Pagina  principal';
        $this->load->view('plantilla/header',$data);
        $this->load->view('contactos/index');
        $this->load->view('plantilla/footer');
    }
    public function agregar(){
        $data['titulo']='Agregar Nuevo Contacto';
        $this->load->view('plantilla/header',$data);
        $this->load->view('contactos/agregar');
        $this->load->view('plantilla/footer');
    }
    public function agregarContacto(){
        $this->form_validation->set_rules('nnombre','Nombre','required');
        $this->form_validation->set_rules('ndireccion','Direccion','required');
        $this->form_validation->set_rules('ntelefono','Telefono','required');
        
        if($this->form_validation->run()==FALSE){
            
            $data['titulo']='Agregar Nuevo Contacto';
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
            $this->Model_contactos->insertar($data);
            redirect(base_url(),'contactos/');
        }
    }
}
?>