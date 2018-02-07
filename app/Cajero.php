<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class Cajero extends Model
{
    protected $table='cajero';
    protected $primaryKey='idcajero';
    public $timestamps=false;

    protected $fillable=[
    'nombrecajero',
    'fechanacimiento',
    'ciudadnacimiento',
    'direccion',
    'telefono',
    'email',
    'usuario',
    'estado'
    ];

    protected $guarded=[];
}
