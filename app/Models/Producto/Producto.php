<?php

namespace App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    use HasFactory;

    protected $table = 'PRODUCTOS';
    protected $primaryKey = 'PRO_ID';
    public $timestamps = true;

    
    const CREATED_AT = 'PRO_CREATED_AT';
    const UPDATED_AT = 'PRO_UPDATED_AT';
    
    protected $fillable = [
        'PRO_NOMBRE',
        'PRO_DESCRIPCION',
        'PRO_PRECIO',
        'PRO_STOCK',
        'PRO_DELETE',
        'PRO_DATE_DELETE',
        'PRO_USER_UPDATE',
        'PRO_USER_DELETE',
        'PRO_USER_CREATE',
        'PRO_ID_PROVEEDOR',
        'PRO_ALTO',
        'PRO_ANCHO',
        'PRO_PESO',
        'PRO_CODE_COPE',
        'PRO_CODE_INTERNO_CLIENTE',
        'PRO_CODE_PARTE',
        'PRO_CODE_PARTE_CLIENTE',
        'PRO_ID_UNIDAD_MEDIDA',
        'PRO_PROFUNDIDAD',
        'PRO_DENSIDAD',
        'PRO_MARGEN','PRO_ARANCELES','PRO_SEMANAS_ENTREGA',
        'PRO_HS_CODIGO','PRO_PARTIDA'
    ];


}
