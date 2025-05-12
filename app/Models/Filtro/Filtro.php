<?php

namespace App\Models\Filtro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;

    protected $table = 'FILTROS';
    protected $primaryKey = 'FIL_ID';
    public $timestamps = true;

    
    const CREATED_AT = 'FIL_CREATED_AT';
    const UPDATED_AT = 'FIL_UPDATED_AT';
    
    protected $fillable = [
        'FIL_NOMBRE',
        'FIL_CONSULTA_SQL',
        'FIL_COLUMNAS_FILTRO',
        'FIL_USER_CREATE',
        'FIL_USER_UPDATE',
        'FIL_USER_DELETE',
        'FIL_DELETE',
        'FIL_DATE_DELETE',
         'FIL_CREATED_AT', 'FIL_UPDATED_AT'
    ];
}
