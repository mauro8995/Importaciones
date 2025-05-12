<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'PROVEEDOR';
    protected $primaryKey = 'PRO_ID';
    public $timestamps = true;

    const CREATED_AT = 'PRO_CREATED_AT';
    const UPDATED_AT = 'PRO_UPDATED_AT';

    protected $fillable = [
        'PRO_NOMBRE',
        'PRO_TELEFONO',
        'PRO_CORREO',
        'PRO_DIRECCION',
        'PRO_MONEDA',
        'PRO_TIPO_CUENTA',
        'PRO_BANCO',
        'PRO_NUMERO_CUENTA',
        'PRO_NOMBRE_REPRESENTANTE',
        'PRO_TIPO_PROVEEDOR',
        'PRO_RUBRO',
        'PRO_ESTADO',
        'PRO_USER_CREATE',
        'PRO_USER_UPDATE',
        'PRO_USER_DELETE',
        'PRO_DELETE',
        'PRO_DATE_DELETE'
    ];

    public function scopeNotDeleted($query)
    {
        return $query->where('PRO_DELETE', false);
    }
}
