<hr>
<center>&copy; 2016 - Todos los derechos reservados </center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/librerias/jquery_validation/lib/jquery.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/librerias/jquery_validation/dist/jquery.validate.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $(".jQuery_validate").validate();
    });

</script>

<style>
    label.error{
        position: absolute;
        top: 8px;
        right: 10px;
        padding: 0px 10px;
        background: #FFFFFF;
        z-index: 100000;
        font-weight: 100;
        color: #FF0000;
    }
</style>


</body>
</html>