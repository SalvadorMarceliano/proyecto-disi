<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventasModel extends Model
{
    use HasFactory;
    protected $primaryKey = "idVenta";
    protected $foreignKey = 'idProducto';
    protected $table = 'ventas';
    protected $fillable=[
        'fecha',
        'cantidad',
        'total',
        'idProducto',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\ProductoModel', 'idProducto', 'idProducto');
    }
}


