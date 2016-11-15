<h1 align='center'>Pagina para buscar contactos</h1>
<br/>
<!--Formulario para buscar contactos-->
<div class="container">
    <div id="body">

        <form id="form" method="POST" action="<?php base_url('contactos/buscar/') ?>">
            <!--<span class="input-group-addon" id="basic-addon1">Nombre:</span>-->
            <input type="text" id="datosBuscar" name="datosBuscar" class="form-control" placeholder="Ingrese el nombre:"/><br>
            <input type="submit" class="btn btn-success pull-right" id="buscar" value="Buscar"/><br>
        </form>
        <br>     


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
                if ($result) {
                    foreach ($result->result() as $row) {

                        echo '<tr><td>' . $row->id . '</td>';
                        echo '<td>' . $row->Nombre . '</td>';
                        echo '<td>' . $row->Direccion . '</td>';
                        echo '<td>' . $row->Telefono . '</td>';
                        echo '<td><a href="' . base_url('Contactos/editar/' . $row->id) . '">Editar</a><br>';
                        echo '<a href="' . base_url('Contactos/borrar/' . $row->id) . '">Eliminar</a></td></tr>';
                        echo "<br/><hr><br/>";
                    }
                }
                ?>
            </table>
        </center>
    </div>
