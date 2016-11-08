<center><h1>Agenda realizada con php, CodeIgniter y Bootstrap</h1></center>
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <center>
                <?php
     /**
     * En esta lineas se imprimen los datos que han sido ingresados en la tabla contactos
     * 
     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
     * @param none
     * @return none
     * @version 1.0
     */
                foreach ($dataContactos as $row){
                    echo 'ID: '.$row->id."<br/>";
                    echo 'Nombre: '.$row->Nombre."<br/>";
                    echo 'Direccion: '.$row->Direccion."<br/>";
                    echo 'Telefono: '.$row->Telefono."<br/>";
                    echo "<br/><hr><br/>";
                }
                ?>
            </center>
        </div>
    </div>
</div>

