<?php

 class Home extends CI_Controller{
     /**
     * Funcion inicial para cargar la vista agenda web
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
     public function index() {
        $data['titulo']='Agenda Web';
        $this->load->view('plantilla/header',$data);
        $this->load->view('home/index');
        $this->load->view('plantilla/footer');
    }
}
?> 