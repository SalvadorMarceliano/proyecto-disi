<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\controllers\facturasController;

class facturasModel extends Model
{
    use HasFactory;
    protected $primaryKey ='idfactura';
    protected $foreignKey ='idventa';
    protected $table = 'facturas';
    protected $fillable =[
        'razon-social',
        'rfc',
        'idventa',
        'iva',
    ];
    public function venta(){
        return $this->belongsTo('App\Models\ventasModel','idventa','idventa');
    }
}
