<?php
class Word extends CI_Controller {

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
        $this->load->library('basic_PHPWord/PHPWord');
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
        $seccion = $this->phpword->createSection(array('orientation' => 'landscape'));

        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');

        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => PHPWord_Style_Cell::TEXT_DIR_BTLR);

        $fontStyle = array('bold' => true, 'align' => 'center');

        $this->phpword->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

        $table = $seccion->addTable('myOwnTableStyle');

        $table->addRow(2000);

        $table->addCell(2000, $styleCell)->addText('Id', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Nombre', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Apellido', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Direccion', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Telefono', $fontStyle);
        $table->addCell(1000, $styleCell)->addText('Correo', $fontStyle);
        $table->addCell(1000, $styleCell)->addText('Estado', $fontStyle);

        $dataContacto = $this->model_contactos->obtenerTodo();

        if (!is_null($dataContacto)):
            //creo la variable de conteo
            $valorConteo = 2;

            //itero la data
            foreach ($dataContacto as $itemContacto):
                $estado = 'activo';
                if ($itemContacto->est_id == 2):
                    $estado = 'inactivo';
                endif;
                $table->addRow(2000);
                $table->addCell(2000)->addText($itemContacto->con_id);
                $table->addCell(2000)->addText($itemContacto->con_nombre);
                $table->addCell(2000)->addText($itemContacto->con_apellido);
                $table->addCell(2000)->addText($itemContacto->con_direccion);
                $table->addCell(2000)->addText($itemContacto->con_telefono);
                $table->addCell(2000)->addText($itemContacto->con_email);
                $table->addCell(2000)->addText($estado);
                //aumento el valor de conteo
                $valorConteo ++;
            endforeach;

        endif;


        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment;filename="Contactos.docx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPWord_IOFactory::createWriter($this->phpword, 'Word2007');
        $objWriter->save('php://output');
    }
}