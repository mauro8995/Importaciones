<?php

namespace App\Models\UnidadMedida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = 'UNIDAD_MEDIDA'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'UNI_ID'; // Clave primaria

    public $timestamps = false; // Desactivar timestamps automáticos (si no usas `created_at` y `updated_at` de Laravel)

    protected $fillable = [
        'UNI_NOMBRE',
        'UNI_USER_CREATE',
        'UNI_USER_UPDATE',
        'UNI_USER_DELETE',
        'UNI_DELETE',
        'UNI__DATE_DELETE',
        'UNI_CREATED_AT',
        'UNI_UPDATED_AT'
    ];
}
