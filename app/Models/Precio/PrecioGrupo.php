<?php

namespace App\Models\Precio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PrecioGrupo extends Model
{
    use HasFactory;

    protected $table = 'PRECIO_GRUPOS';

    protected $primaryKey = 'PG_ID';

    public $timestamps = true;

    const CREATED_AT = 'PG_CREATED_AT';
    const UPDATED_AT = 'PG_UPDATED_AT';

    protected $fillable = [
        'PG_NOMBRE',
        'PG_DESCRIPCION',
        'PG_USER_CREATE',
        'PG_USER_UPDATE',
        'PG_USER_DELETE'
    ];

    public function detalles()
    {
        return $this->hasMany(PrecioGrupoDetalle::class, 'PGD_PG_ID');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'PG_USER_CREATE');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'PG_USER_UPDATE');
    }

    public function userDelete()
    {
        return $this->belongsTo(User::class, 'PG_USER_DELETE');
    }
}
