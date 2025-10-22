<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /**
     * Mass-assignable columns matching the spec & migration.
     */
    protected $fillable = [
        'name',
        'code',
        'primary_color',
        'accent_color',
        'logo_url',
    ];

    /**
     * Useful casting; timestamps handled by base Model.
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Relationship: a company has many users.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
