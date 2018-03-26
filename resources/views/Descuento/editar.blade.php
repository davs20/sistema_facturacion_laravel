
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="./">Inicio</a></li>
            <li><a class="ajax-request" href="{{url('/descuento')}}">Descuento</a></li>
            <li><a class="active" href="#">Descuento Editar</a></li>
        </ol>
    </div>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Descuento Editar</div>
                    <div class="panel-body">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <form method="post" action="#" id="formulario_editar">
                                <div class="col-sm-12">

                                    @foreach($descuento as $des)
                                    <label class='control-sidebar-subheading' for="fecha">Id</label>
                                    <input type="text" name="id" id="id" required maxlength="255" class="form-control"
                                           readonly value="{{$des->id}}" disabled/>
                                </div>
                                <div class="col-sm-12">
                                    <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                                    <input type="text" name="nombre" id="nombre" required maxlength="255"
                                           class="form-control" value="{{$des->descripcion}}"/>
                                </div>

                                <div class="col-sm-6">
                                    <label class='control-sidebar-subheading' for="fecha">Porcentaje</label>
                                    <input type="number" name="porcentaje" id="precio" required step="any"
                                           class="form-control" value="{{$des->porcentaje}}"/>
                                </div>
                                <div class="col-sm-12">
                                    <label class='control-sidebar-subheading' for="fecha">Estado</label>
                                    <select name="estado" class="form-control">
                                        <option value="1"  >Habilitado
                                        </option>
                                        <option value="0" >Deshabilitado
                                        </option>
                                    </select>
                                    @endforeach
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Enviar"/>
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
        $(formulario_editar).ready(function () {
            $('input[type="submit"]').removeAttr('disabled');
        });
        $(formulario_editar).submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: $("#formulario_editar").attr("method"),
                url: $("#formulario_editar").attr("action"),
                data: $("#formulario_editar").serialize(),
                dataType: 'html',
                success: function (data) {
                    //var obj = jQuery.parseJSON( data);
                    if (data == "Ok") {
                        swal({
                            title: "<small>¡Informacion!</small>",
                            text: " Registro modificado correctamente ",
                            html: true,
                            confirmButtonText: "Cerrar",
                        });
                        $('input[type="submit"]').attr("disabled", "true");
                    } else {
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
                error: function (data) {
                    $('input[type="submit"]').removeAttr('disabled');
                    console.log(data);
                }
            });
        });
    </script>

