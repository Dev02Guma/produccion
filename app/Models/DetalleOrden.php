<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    public $timestamps = false;
    protected $table = "inn_home_details_orden_prod";
   // protected $fillable = ['numOrden', 'costo_id', 'cantidad', 'costo_unitario'];
}
