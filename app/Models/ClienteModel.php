<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCliente';
    protected $foreignKey = 'idProducto';
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rfc',
        'telefono',
        'correo',
        'direcccion',
        'idProducto',
    ];

    public function producto(){
        return $this->belongsTo('App\Models\ProductoModel', 'idProducto', 'idProducto');
    }
}
