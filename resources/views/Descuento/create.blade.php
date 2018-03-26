<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="./">Inicio</a></li>
        <li><a class="ajax-request" href="{{url('descuento/store')}}">Descuento</a></li>
        <li><a class="active" href="#">Descuento Nuevo</a></li>
    </ol>
</div>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Descuento Nuevo</div>
                <div class="panel-body">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form method="POST" action="{{ route('descuento.store') }}" id="formulario_crear_descuento">
                            <div class="col-sm-12">

                                <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                                <input type="text" name="nombre" id="nombre" required maxlength="255" class="form-control"/>
                            </div>

                            <div class="col-sm-6">
                                <label class='control-sidebar-subheading' for="fecha">Porcentaje</label>
                                <input type="number" name="porcentaje" id="precio" required step="any" class="form-control"/>
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <input type="submit" class="btn btn-primary" value="Enviar" disabled />
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
    $(formulario_crear_descuento).ready(function(){
        $('input[type="submit"]').removeAttr('disabled');
    });
    $(formulario_crear_descuento).submit(function( event ) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:$("#formulario_crear_descuento").attr("method"),
            url:  $("#formulario_crear_descuento").attr("action"),
            data:$("#formulario_crear_descuento").serialize(),
            dataType: 'html',
            success: function(data){
                //var obj = jQuery.parseJSON( data);


                if(data=="Ok"){
                    swal({
                        title: "<small>¡Informacion!</small>",
                        text: " Registro creado correctamente ",
                        icon: "success",
                        html: true,
                        confirmButtonText: "Cerrar"

                    }).then(function () {
                        window.location.href = "/descuento"
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