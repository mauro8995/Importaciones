<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orden\Orden_cabecera;
use App\Models\Producto\Producto;

class Orden_detalle extends Model
{
    use HasFactory;

    protected $table = 'ORDEN_DETALLE';
    protected $primaryKey = 'ORD_DET_ID';
    public $timestamps = false;

    protected $fillable = [
        'ORD_ID_ORDEN_CABECERA',
        'ORD_DET_PRODUCTO_ID',
        'ORD_DET_CODE_COPE',
        'ORD_DET_COD_CLIENTE',
        'ORD_DET_UNI_MEDIDA',
        'ORD_DET_CANTIDAD',
        'ORD_DET_PRECIO',
        'ORD_DET_SEMANAS',
        'ORD_DET_CIF_VALOR',
        'ORD_DET_SALES_FACTOR',
        'ORD_DET_AD_VALOREM',
        'ORD_DET_AD_VALOREM_TOTAL',
        'ORD_DET_PRECIO_UNI',
        'ORD_DET_PRECIO_UNI_TOTAL',
        'ORD_DET_UNIDAD_MAKE_UP',
        'ORD_DET_UNIDAD_MAKE_UP_TOTAL',
        'ORD_DET_SALE_SALE',
        'ORD_DET_SALE_SALE_TOTAL',
        'ORD_DET_VALOR_TOTAL',
        'ORD_DET_INFO',
        'ORD_DET_DELETE',
        'ORD_DET_CALCULO',
        'ORD_ID_TIPO_ENVIO',
        'ORD_ID_ESTADO'
    ];

    public function ordenCabecera()
    {
        return $this->belongsTo(Orden_cabecera::class, 'ORD_ID_ORDEN_CABECERA', 'ORD_ID');
    }


    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ORD_DET_PRODUCTO_ID', 'PRO_ID');
    }
}
