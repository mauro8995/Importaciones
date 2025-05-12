<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Configuracion extends Model
{
    use HasFactory;

    protected $table = 'CONFIGURACION'; // Nombre de la tabla

    protected $primaryKey = 'CONF_ID'; // Clave primaria personalizada

    public $timestamps = true; // Laravel maneja los timestamps

    protected $fillable = [
        'CONF_KEY',
        'CONF_VALUE',
        'CONF_USER_CREATE',
        'CONF_USER_UPDATE',
        'CONF_USER_DELETE',
        'CONF_DELETE',
        'CONF_DATE_DELETE',
    ];

    protected $dates = ['CONF_DATE_DELETE', 'created_at', 'updated_at'];

    // Relaciones con la tabla users
    public function creador()
    {
        return $this->belongsTo(User::class, 'CONF_USER_CREATE');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'CONF_USER_UPDATE');
    }

    public function eliminador()
    {
        return $this->belongsTo(User::class, 'CONF_USER_DELETE');
    }
}
