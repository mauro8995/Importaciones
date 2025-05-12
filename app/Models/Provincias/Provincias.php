<?php

namespace App\Models\Provincias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;

    protected $table = 'ubigeo_peru_provinces';
    protected $primaryKey = 'id';

    public $incrementing = false; // Evita que Laravel lo trate como autoincremental
    protected $keyType = 'string'; // Define que la clave primaria es un string
    protected $casts = [
        'id' => 'string', // Forzar a que el ID sea tratado como string
    ];
    protected $fillable = [
        'name',
        'department_id',
    ];
}
