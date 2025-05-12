<?php

namespace App\Models\Tipo_cuenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCuenta extends Model
{
    use HasFactory;

    protected $table = 'TIPO_CUENTA';
    protected $primaryKey = 'TCU_ID';
    public $timestamps = true;

    const CREATED_AT = 'TCU_CREATED_AT';
    const UPDATED_AT = 'TCU_UPDATED_AT';

    protected $fillable = [
        'TCU_NOMBRE',
        'TCU_ESTADO',
        'TCU_USER_CREATE',
        'TCU_USER_UPDATE',
        'TCU_USER_DELETE',
        'TCU_DELETE',
        'TCU_DATE_DELETE'
    ];

    public function scopeNotDeleted($query)
    {
        return $query->where('TCU_DELETE', false);
    }
}
