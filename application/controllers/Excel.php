<?php

class Excel extends CI_Controller {

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
        $this->load->library('basic_PHPExcel/PHPExcel');
        //cargo el modelo contacto
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
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                ->setLastModifiedBy("Arkos Noem Arenom")
                ->setTitle("Office 2007 XLSX Test Document")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");


        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Id')
                ->setCellValue('B1', 'Nombre')
                ->setCellValue('C1', 'Direccion')
                ->setCellValue('D1', 'Telefono');

        // La librería puede manejar la codificación de caracteres UTF-8
        
        //obtengo la información de los contactos
        $dataContacto = $this->model_contactos->obtenerTodo();
        //valido si la data trae resultados
        if (!is_null($dataContacto)):
            //creo la variable de conteo
            $valorConteo = 2;
            
            //itero la data
            foreach ($dataContacto as $itemContacto):
                //agrego la fila con los datos del contacto
                $this->phpexcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$valorConteo, $itemContacto->con_id)
                        ->setCellValue('B'.$valorConteo, $itemContacto->con_nombre)
                        ->setCellValue('C'.$valorConteo, $itemContacto->con_direccion)
                        ->setCellValue('D'.$valorConteo, $itemContacto->con_telefono);
                //aumento el valor de conteo
                $valorConteo ++;
            endforeach;
            
        endif;



        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Simple');

        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);


        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}
