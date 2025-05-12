<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class files_multimedia extends Model
{
    use HasFactory;



    protected $table = 'FILES_MULTIMEDIA';
    protected $primaryKey = 'FILE_ID';
    public $timestamps = false;

    const UPDATED_AT = 'FILE_UPDATED_AT';

    // Personaliza el nombre de la columna de eliminación lógica
    const DELETED_AT = 'FILE_DATE_DELETE';

    
    const CREATED_AT = 'FILE_CREATED_AT';

    protected $fillable = [
        'FILE_TYPE',
        'FILE_RUTA',
        'FILE_USER_CREATE',
        'FILE_USER_UPDATE',
        'FILE_USER_DELETE',
        'FILE_DELETE',
        'FILE_DATE_DELETE',
        'FILE_CREATED_AT',
        'FILE_UPDATED_AT','FILE_CODE','FILE_ID_EXTERNO'
    ];

    protected $casts = [
        'FILE_DELETE' => 'boolean',
        'FILE_DATE_DELETE' => 'datetime',
        'FILE_CREATED_AT' => 'datetime',
        'FILE_UPDATED_AT' => 'datetime',
    ];

    // Relaciones con usuarios
    public function userCreated()
    {
        return $this->belongsTo(User::class, 'FILE_USER_CREATE');
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'FILE_USER_UPDATE');
    }

    public function userDeleted()
    {
        return $this->belongsTo(User::class, 'FILE_USER_DELETE');
    }
}
