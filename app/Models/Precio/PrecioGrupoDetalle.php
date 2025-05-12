<?php

namespace App\Models\Precio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioGrupoDetalle extends Model
{
    use HasFactory;

    protected $table = 'PRECIO_GRUPO_DETALLES';

    protected $primaryKey = 'PGD_ID';

    public $timestamps = true;

    const CREATED_AT = 'PGD_CREATED_AT';
    const UPDATED_AT = 'PGD_UPDATED_AT';

    protected $fillable = [
        'PGD_PG_ID',
        'PGD_NOMBRE',
        'PGD_NOMBRE2',
        'PGD_DESCRIPCION',
        'PGD_TASA_INTERES',
        'PGD_COSTO_IGV',
        'PGD_USER_CREATE',
        'PGD_USER_UPDATE',
        'PGD_USER_DELETE'
    ];

    public function grupo()
    {
        return $this->belongsTo(PrecioGrupo::class, 'PGD_PG_ID');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'PGD_USER_CREATE');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'PGD_USER_UPDATE');
    }

    public function userDelete()
    {
        return $this->belongsTo(User::class, 'PGD_USER_DELETE');
    }
}
