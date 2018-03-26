<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table="descuento";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable=["descripcion","porcentaje","fecha_creacion","fecha_modificacion"];
}

