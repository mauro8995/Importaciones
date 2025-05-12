<?php

namespace App\Models\Marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'MARCA'; // Nombre exacto de la tabla en la base de datos
    protected $primaryKey = 'MAR_IDE'; // Clave primaria
    public $timestamps = true; // Se manejan manualmente

   
   const CREATED_AT = 'MAR_CREATED_AT';

   /**
    * The name of the "updated at" column.
    *
    * @var string
    */
   const UPDATED_AT = 'MAR_UPDATED_AT';

   // Personaliza el nombre de la columna de eliminación lógica
   const DELETED_AT = 'MAR_DELETE_AT';

    protected $fillable = [
        'MAR_NOMBRE',
        'MAR_DESCRIPCION',
        'MAR_ICONO',
        'MAR_USER_CREATE',
        'MAR_USER_UPDATE',
        'MAR_USER_DELETE',
        'MAR_DELETE'
    ];

    protected $dates = ['MAR_DELETE_AT', 'MAR_CREATED_AT', 'MAR_UPDATED_AT'];

    /**
     * Relación con el usuario que creó la marca.
     */
    public function creador()
    {
        return $this->belongsTo(User::class, 'MAR_USER_CREATE');
    }

    /**
     * Relación con el usuario que actualizó la marca.
     */
    public function actualizador()
    {
        return $this->belongsTo(User::class, 'MAR_USER_UPDATE');
    }

    /**
     * Relación con el usuario que eliminó la marca.
     */
    public function eliminador()
    {
        return $this->belongsTo(User::class, 'MAR_USER_DELETE');
    }
}
