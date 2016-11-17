<h1 align='center'>Pagina para actualizar contactos</h1>
<br/>
<!--Formulario para agregar contactos-->
<div class="container">
    <?php echo form_open(base_url() . 'contactos/actualizar/'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Nombre:</span>
                <input type="text" class="form-control" placeholder="Tu nombre aqui:" name="nnombre" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_nombre ?>">
            </div>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Direccion:</span>
                <input type="text" class="form-control" placeholder="Tu direccion aqui:" name="ndireccion" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_direccion ?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Telefono:</span>
                <input type="label" class="form-control" placeholder="Tu telefono aqui:" name="ntelefono" aria-describedby="basic-addon1" value="<?php echo $infoContacto[0]->con_telefono ?>">
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