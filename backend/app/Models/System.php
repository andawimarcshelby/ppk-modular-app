<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class System extends Model
{
    /**
     * Mass assignable columns.
     */
    protected $fillable = [
        'name',
        'code',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Relationship: a system has many modules.
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
