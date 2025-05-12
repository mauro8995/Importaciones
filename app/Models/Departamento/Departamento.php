<?php

namespace App\Models\Departamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'ubigeo_peru_departments';
    protected $primaryKey = 'id';

    public $incrementing = false; // Evita que Laravel lo trate como autoincremental
    protected $keyType = 'string'; // Define que la clave primaria es un string
    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'string', // Forzar a que el ID sea tratado como string
    ];
}
