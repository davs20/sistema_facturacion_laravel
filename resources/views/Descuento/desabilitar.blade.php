
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="./">Inicio</a></li>
        <li><a class="ajax-request" href="/inventario/impuesto/impuesto.php">Impuesto</a></li>
        <li><a class="active" href="#">Impuesto Eliminar</a></li>
    </ol>
</div>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Impuesto a eliminar</div>
                <div class="panel-body">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form method="post" action="#" id="formulario_eliminar">
                            <div class="col-sm-12">
                                <label class='control-sidebar-subheading' for="fecha">Id</label>
                                <input type="text" name="id" id="id" required maxlength="255" class="form-control" readonly value="<?php echo $id; ?>"/>
                            </div>
                            <div class="col-sm-12">
                                <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                                <input type="text" name="nombre" id="nombre" required maxlength="255" class="form-control" disabled value="<?php echo $descripcion; ?>"/>
                            </div>

                            <div class="col-sm-6">
                                <label class='control-sidebar-subheading' for="fecha">Porcentaje</label>
                                <input type="number" name="porcentaje" id="precio" required step="any" class="form-control" disabled value="<?php echo $porcentaje; ?>" />
                            </div>
                            <div class="col-sm-12">
                                <label class='control-sidebar-subheading' for="fecha" >Estado</label>
                                <select name="estado" class="form-control" disabled>
                                    <option value="1" <?php if($estado==1) echo "selected"; ?> >Habilitado</option>
                                    <option value="0" <?php if($estado==0) echo "selected"; ?>>Deshabilitado</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class='control-sidebar-subheading' for="fecha" >Estado</label>
                                <select name="estado" class="form-control" disabled>
                                    <option value="1" <?php if($estado==1) echo "selected"; ?> >Habilitado</option>
                                    <option value="0" <?php if($estado==0) echo "selected"; ?>>Deshabilitado</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <input type="submit" class="btn btn-danger" value="Enviar" disabled />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(formulario_eliminar).ready(function(){
        $('input[type="submit"]').removeAttr('disabled');
    });
    $(formulario_eliminar).submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type:"POST",
            url:  './controlador/impuesto/impuestoeliminar.php',
            data:$("#formulario_eliminar").serialize(),
            dataType: 'html',
            success: function(data){
                //var obj = jQuery.parseJSON( data);
                if(data=="Ok"){
                    swal({
                        title: "<small>¡Informacion!</small>",
                        text: " Registro eliminado correctamente ",
                        html: true,
                        confirmButtonText: "Cerrar",
                    });
                    $('input[type="submit"]').attr("disabled", "true");
                }else{
                    swal({
                        title: "<small>¡Informacion!</small>",
                        text: " Error ",
                        html: true,
                        confirmButtonText: "Cerrar",
                    });
                    $('input[type="submit"]').removeAttr('disabled');
                }

                //var json = $.parseJSON(data);

            },
            error: function(data){
                $('input[type="submit"]').removeAttr('disabled');
                console.log(data);
            }
        });
    });
</script>