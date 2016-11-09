<h1 align='center'>Pagina para buscar contactos</h1>
<br/>
<!--Formulario para agregar contactos-->
<div class="container">
    <?php echo form_open(base_url().'contactos/borrar');?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Nombre:</span>
                <input type="text" class="form-control" placeholder="Tu nombre aqui:" name="nnombre" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <br><button type="submit" class="btn btn-success pull-right">Buscar</button> 
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