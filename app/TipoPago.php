<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $table='tipodepago';
    protected $primaryKey='idtipopago';
    public $timestamps=false;

    protected $fillable=[
    'idtipopago',
    'nombretipopago',
    'referencias',
    'descripcion',
    'estado'
    ];

    protected $guarded=[];
}
