<?php

namespace App\Models\Rubro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'RUBRO';
    protected $primaryKey = 'RUB_ID';
    public $timestamps = true;

    const CREATED_AT = 'RUB_CREATED_AT';
    const UPDATED_AT = 'RUB_UPDATED_AT';

    protected $fillable = [
        'RUB_NOMBRE',
        'RUB_USER_CREATE',
        'RUB_USER_UPDATE',
        'RUB_USER_DELETE',
        'RUB_DELETE',
        'RUB_DATE_DELETE'
    ];

    public function scopeNotDeleted($query)
    {
        return $query->where('RUB_DELETE', false);
    }
}
