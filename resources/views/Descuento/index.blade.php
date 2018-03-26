<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="./">Inicio</a></li>
        <li><a class="active" href="#">Descuento</a></li>
    </ol>
</div>
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                <a class="btn btn-primary ajax-request" href="{{url('/descuento/create')}}">
                    <i class="fa fa-plus"></i> Nuevo Descuento
                </a>
            </h3>
        </div>
    </div>
</div>

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Descuento</div>
                <div class="panel-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped table-condensed" id="datos">
                            <thead>
                            <th>Id</th>
                            <th>Descripcion</th>
                            <th>Porcentaje</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            </thead>
                            <tbody>
                            @foreach($descuento as $esc)
                                <tr>

                                    <td>{{$esc->id}}</td>
                                    <td>{{$esc->descripcion}}</td>
                                    <td>{{$esc->porcentaje}}</td>
                                    <td>{{$esc->estado}}</td>
                                    <td>
                                        <a class="btn btn-primary ajax-request"
                                           href="{{url('descuento/edit/'.$esc->id)}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-success ajax-request"
                                           href="{{url('descuento/show'.$esc->id)}}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a class="btn btn-danger ajax-request"
                                           href="{{url('descuento/delete'.$esc->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

