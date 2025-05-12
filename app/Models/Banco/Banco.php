<?php

namespace App\Models\Banco;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'BANCO';
    protected $primaryKey = 'BAN_ID';
    public $timestamps = true;

    const CREATED_AT = 'BAN_CREATED_AT';
    const UPDATED_AT = 'BAN_UPDATED_AT';

    protected $fillable = [
        'BAN_NOMBRE',
        'BAN_USER_CREATE',
        'BAN_USER_UPDATE',
        'BAN_USER_DELETE',
        'BAN_DELETE',
        'BAN_DATE_DELETE'
    ];

    public function scopeNotDeleted($query)
    {
        return $query->where('BAN_DELETE', false);
    }
}
