<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass-assignable columns matching our spec.
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'company_id',
        'is_active',
    ];

    /**
     * Hidden attributes when serializing.
     */
    protected $hidden = [
        'password',
        // 'remember_token', // column dropped; kept commented for clarity
    ];

    /**
     * Casts for attributes.
     * - 'password' => 'hashed' automatically bcrypt-hashes when set.
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    /**
     * Relationship: a user belongs to a company.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relationship: submodules granted to this user via pivot user_submodule.
     */
    public function submodules(): BelongsToMany
    {
        return $this->belongsToMany(Submodule::class, 'user_submodule')
            ->withPivot(['granted_at', 'created_by']);
    }
}
