<center><h1>Agenda realizada con php, CodeIgniter y Bootstrap</h1></center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </tr>
                    <?php
                    /**
                     * En esta lineas se imprimen los datos que han sido ingresados en la tabla contactos
                     * 
                     * @author Cesar Fernando Silva <cesar.silvam97@gmail.com>
                     * @param none
                     * @return none
                     * @version 1.0
                     */
                    foreach ($dataContactos as $row) {
                        echo '<tr><td>' . $row->id . '</td>';
                        echo '<td>' . $row->Nombre . '</td>';
                        echo '<td>' . $row->Direccion . '</td>';
                        echo '<td>' . $row->Telefono . '</td>';
                        echo '<td><a href="' . base_url('Contactos/editar/' . $row->id) . '"><span class="glyphicon glyphicon-pencil"></span>Editar</a><br>';
                        echo '<a href="' . base_url('Contactos/borrar/' . $row->id) . '"><span class="glyphicon glyphicon-remove-circle"></span>Eliminar</a></td></tr>';
                        echo "<br/><hr><br/>";
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>
</div>

