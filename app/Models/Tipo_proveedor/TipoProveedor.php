<?php

namespace App\Models\Tipo_proveedor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProveedor extends Model
{
    use HasFactory;

    protected $table = 'TIPO_PROVEEDOR';
    protected $primaryKey = 'TPRO_ID';
    public $timestamps = true;

    const CREATED_AT = 'TPRO_CREATED_AT';
    const UPDATED_AT = 'TPRO_UPDATED_AT';

    protected $fillable = [
        'TPRO_NOMBRE',
        'TPRO_USER_CREATE',
        'TPRO_USER_UPDATE',
        'TPRO_USER_DELETE',
        'TPRO_DELETE',
        'TPRO_DATE_DELETE'
    ];

    public function scopeNotDeleted($query)
    {
        return $query->where('TPRO_DELETE', false);
    }
}
