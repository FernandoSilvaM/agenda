<h1 align='center'>Pagina para actualizar contactos</h1>
<br/>
<!--Formulario para agregar contactos-->
<div class="container">
    <?php echo form_open(base_url() . 'contactos/actualizar', array('class' => 'jQuery_validate', 'autocomplete' => 'off')); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Nombre:</span>
                <input type="text" class="form-control" required="required" placeholder="Tu nombre aqui:" name="nnombre" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_nombre ?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Apellido:</span>
                <input type="text" class="form-control" required="required" placeholder="Tu apellido aqui:" name="napellido" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_apellido ?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Direccion:</span>
                <input type="text" class="form-control" required="required"  placeholder="Tu direccion aqui:" name="ndireccion" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_direccion ?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Telefono:</span>
                <input type="number" class="form-control number" maxlength="10" minlength="7"  required="required" placeholder="Tu telefono aqui:" name="ntelefono" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_telefono ?>">
             <!--readonly="readonly"    Etiqueta para deshabilitar campos-->
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Correo:</span>
                <input type="email" class="form-control" required="required" placeholder="Tu correo aqui:" name="ncorreo" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_email ?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Estado:</span>
                <select name="estado" class="form-control">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <input type='hidden' value='<?php echo $infoContacto[0]->con_id ?>' name='idUsuario' id='idUsuario'>
            <br><button type="submit" class="btn btn-success pull-right">Actualizar</button> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!--Linea para imprimir los errores-->
            <?php echo validation_errors(); ?>
        </div>
    </div>

    <!--Cerrar formulario-->
    <?php echo form_close(); ?>
</div>