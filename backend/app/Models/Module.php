<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    /**
     * Mass assignable columns.
     */
    protected $fillable = [
        'system_id',
        'name',
        'code',
        'icon',
    ];

    protected $casts = [
        'id' => 'integer',
        'system_id' => 'integer',
    ];

    /**
     * Relationship: this module belongs to a system.
     */
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }

    /**
     * Relationship: a module has many submodules.
     */
    public function submodules(): HasMany
    {
        return $this->hasMany(Submodule::class);
    }
}
