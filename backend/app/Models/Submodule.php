<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Submodule extends Model
{
    protected $fillable = [
        'module_id',
        'name',
        'code',
        'route',
    ];

    protected $casts = [
        'id' => 'integer',
        'module_id' => 'integer',
    ];

    /**
     * This submodule belongs to a module.
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Users who have this submodule granted (via pivot user_submodule).
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_submodule')
            ->withPivot(['granted_at', 'created_by']);
    }
}
