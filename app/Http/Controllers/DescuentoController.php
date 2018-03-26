<?php

namespace App\Http\Controllers;

use App\Descuento;
use Illuminate\Http\Request;
use App\Http\Requests\DescuentoFormRequest;
use Illuminate\Support\Facades\DB;

class DescuentoController extends Controller
{
    public function index(DescuentoFormRequest $descuentoFormRequest)
    {
        $descuento = DB::table('descuento')->get();
        return view('Descuento.index', ["descuento" => $descuento]);

    }

    public function create()
    {
        return view('Descuento.create');

    }

    public function update()
    {

    }


    ///
    public function edit($id)
    {
    $descuento=DB::table('descuento')
        ->select('id','descripcion','porcentaje')
        ->where('id','=',$id)
        ->get();

         return view('Descuento.editar',["descuento"=>$descuento]);
    }

    ///Sentencia sql para guardar...
    public function store(DescuentoFormRequest $descuentoFormRequest)
    {
        $descuento = new Descuento();
        $descuento->descripcion = $descuentoFormRequest->get('nombre');
        $descuento->porcentaje = $descuentoFormRequest->get('porcentaje');
        $descuento->save();
        return  "Ok";

    }

}
