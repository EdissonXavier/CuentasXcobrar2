<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table='usuario';
    protected $primaryKey='idusuario';
    public $timestamps=false;

    protected $fillable=[
    'idrol',
    'user',
    'password',
    'estado'
    ];

    protected $guarded=[];
}
