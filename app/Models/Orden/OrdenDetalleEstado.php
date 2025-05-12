<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class OrdenDetalleEstado extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ORDEN_DETALLE_ESTADO';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ORDS_IDE';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ORDS_NOMBRE',
        'ORDS_COLOR',
        'ORDS_ICONO',
        'ORDS_USER_CREATE',
        'ORDS_USER_UPDATE',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ORDS_DELETE' => 'boolean',
        'ORDS_DELETE_AT' => 'datetime',
        'ORDS_CREATED_AT' => 'datetime',
        'ORDS_UPDATED_AT' => 'datetime',
    ];

    /**
     * Override Laravel's default created_at and updated_at column names
     */
    const CREATED_AT = 'ORDS_CREATED_AT';
    const UPDATED_AT = 'ORDS_UPDATED_AT';

    /**
     * Get the user that created the status.
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ORDS_USER_CREATE', 'id');
    }

    /**
     * Get the user that updated the status.
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ORDS_USER_UPDATE', 'id');
    }

    /**
     * Get the user that deleted the status.
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ORDS_USER_DELETE', 'id');
    }

    /**
     * Scope a query to only include non-deleted records.
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('ORDS_DELETE', false);
    }
}
