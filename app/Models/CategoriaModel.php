<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCategoria';
    protected $table = 'categorias';
    protected $fillable = [
        'Nombre',
        'Descripcion',
    ];
}
