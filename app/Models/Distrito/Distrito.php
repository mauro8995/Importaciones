<?php

namespace App\Models\Distrito;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'ubigeo_peru_districts';
    protected $primaryKey = 'id';
    
    public $incrementing = false; // Evita que Laravel lo trate como autoincremental
    protected $keyType = 'string'; // Define que la clave primaria es un string
    protected $casts = [
        'id' => 'string', // Forzar a que el ID sea tratado como string
    ];
    protected $fillable = [
        'name',
        'province_id',
        'department_id',
    ];

 
}
