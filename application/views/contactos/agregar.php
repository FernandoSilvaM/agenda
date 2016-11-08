<h1 align='center'>Pagina para agregar contactos</h1>
<br/>

<div class="container">
    <?php echo form_open(base_url(),'contactos/agregar');?>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Nombre:</span>
                <input type="text" class="form-control" placeholder="Tu nombre aqui:" name="nnombre" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Direccion:</span>
                <input type="text" class="form-control" placeholder="Tu direccion aqui" name="ndireccion" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Telefono:</span>
                <input type="text" class="form-control" placeholder="Tu telefono aqui" name="ntelefono" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success pull-right">Guardar</button> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-md-12">
            <?php echo validation_errors(); ?>
    </div>
</div>
    <?php echo form_close(); ?>
</div>