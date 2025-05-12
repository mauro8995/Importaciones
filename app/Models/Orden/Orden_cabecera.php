<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_cabecera extends Model
{
    use HasFactory;

    protected $table = 'ORDEN_CABECERA';
    protected $primaryKey = 'ORD_ID';
    public $timestamps = true;

    
    const CREATED_AT = 'ORD_CREATED_AT';
    const UPDATED_AT = 'ORD_UPDATED_AT';


     
    protected $fillable = [
        'ORD_PROVEEDOR_ID',
        'ORD_FECHA',
        'ORD_SEMANA_ENTREGA',
        'ORD_DIRECCION',
        'ORD_TIPO_ENVIO',
        'ORD_USER_CREATE',
        'ORD_USER_UPDATE',
        'ORD_USER_DELETE',
        'ORD_DELETE',
        'ORD_DATE_DELETE',
        'ORD_ID_PAIS_ORIGEN',
        'ORD_ID_PAIS_DESTINO',
        'ORD_FECHA_LLEGANDA_TENTATIVA',
        'ORD_ID_MONEDA',
        'ORD_TOTAL_ORDEN',
        'ORD_ID_METODO_PAGO',
        'ORD_ID_DEPARTAMENTO',
        'ORD_ID_PROVINCIAS',
        'ORD_ID_DISTRITOS',
        'ORD_COMENTARIOS',
        'ORD_ID_ORDEN_ESTADO',
        'ORD_ID_CLIENTE'
    ];


}
