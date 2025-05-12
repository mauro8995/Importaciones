<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OrdenEstado extends Model
{
    use HasFactory;
    protected $table = 'ORDEN_ESTADO';
    protected $primaryKey = 'ODES_ID';
    public $timestamps = true;
    const CREATED_AT = 'ODES_CREATED_AT';
    const UPDATED_AT = 'ODES_UPDATED_AT';
    const DELETED_AT = 'ODES_DELETE_AT';

    protected $fillable = [
        'ODES_NOMBRE',
        'ODES_COLOR',
        'ODES_ICONO',
        'ODES_USER_CREATE',
        'ODES_USER_UPDATE',
        'ODES_USER_DELETE',
        'ODES_DELETE'
    ];

    protected $casts = [
        'ODES_DELETE' => 'boolean',
    ];

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'ODES_USER_CREATE');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'ODES_USER_UPDATE');
    }

    public function userDelete()
    {
        return $this->belongsTo(User::class, 'ODES_USER_DELETE');
    }
}
