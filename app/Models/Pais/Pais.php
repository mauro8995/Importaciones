<?php

namespace App\Models\Pais;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    use HasFactory;

    protected $table = 'PAIS';
    protected $primaryKey = 'PA_ID';
    public $timestamps = true;

    
    const CREATED_AT = '[PA_CREATED_AT';
    const UPDATED_AT = 'PA_UPDATED_AT';
    
    protected $fillable = [
        'PA_NOMBRE',
        'PA_USER_CREATE',
        'PA_USER_UPDATE',
        'PA_USER_DELETE',
        'PA_DELETE',
        'PA_DATE_DELETE',
        'PA_CREATED_AT',
        'PA_UPDATED_AT',
         'PA_CREATED_AT', 'PA_UPDATED_AT'
    ];
}
