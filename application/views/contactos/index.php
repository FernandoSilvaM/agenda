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
                        echo '<tr><td>' . $row->con_id . '</td>';
                        echo '<td>' . $row->con_nombre . '</td>';
                        echo '<td>' . $row->con_direccion . '</td>';
                        echo '<td>' . $row->con_telefono . '</td>';
                        echo '<td><a href="' . base_url('Contactos/editar/' . $row->con_id) . '"><span class="glyphicon glyphicon-pencil"></span>Editar</a><br>';
                        echo '<a href="' . base_url('Contactos/borrar/' . $row->con_id) . '"><span class="glyphicon glyphicon-remove-circle"></span>Eliminar</a></td></tr>';
                        
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>
</div>

