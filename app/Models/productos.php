<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table = "productos";
    protected $fillable = ['idProducto', 'codigo','nombre','estado'];
    //protected $guarded = ['idProducto'];
    public $timestamps = false;
}
