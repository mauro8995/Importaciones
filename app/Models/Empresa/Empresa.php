<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'EMPRESA';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'EMP_ID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'EMP_CREATED_AT';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'EMP_UPDATED_AT';

    // Personaliza el nombre de la columna de eliminación lógica
    const DELETED_AT = 'EMP_DELETED_AT';

    /**
     * Scope to filter non-deleted records.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('EMP_DELETE', false);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EMP_ID',
        'EMP_NAME',
        'EMP_DELETE',
        'EMP_DATE_DELETE',
        'EMP_USER_UPDATE',
        'EMP_USER_DELETE',
        'EMP_USER_CREATE',
        'EMP_CREATED_AT',
        'EMP_UPDATED_AT',
        'EMP_DELETE_AT',
        'EMP_RUC',
        'EMP_RAZON_SOCIAL',
        'EMP_NOMBRE_COMERCIAL',
        'EMP_DIRECCION_FISCAL',
        'EMP_DISTRITO',
        'EMP_TELEFONO',
        'EMP_EMAIL',
        'EMP_ESTADO_SUNAT',
        'EMP_CONDICION_SUNAT',
        'EMP_REGIMEN_TRIBUTARIO',
        'EMP_LOGO_PATH',
        'EMP_REPRESENTANTE_LEGAL',
        'EMP_DNI_REPRESENTANTE',
        'EMP_IS_ACTIVE',
        'EMP_ID_DEPARTAMENTO',
        'EMP_ID_PROVINCIAS',
        'EMP_ID_DISTRITOS','EMP_DIRECCION'
        
    ];
}
