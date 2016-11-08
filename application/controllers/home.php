<?php

class Home extends CI_Controller{
    public function index() {
        $data['titulo']='Agenda Web';//se crea la variable data con la clave titulo y se le asigna al header
        $this->load->view('plantilla/header',$data);
        $this->load->view('home/index');
        $this->load->view('plantilla/footer');
    }
}
?>