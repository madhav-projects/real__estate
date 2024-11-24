<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'realtron_id', 
        'username', 
        'agent_company',
        'phone', 
        'email', 
        'password',
        'address',
        'city',
        'area',
        'pincode',
        'role',
        'status',
        'profile',
    ];

    /**
     * Relationship with the Realtron model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realtron()
    {
        return $this->belongsTo(Realtron::class);
    }

    /**
     * Relationship with the Generate model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function generates()
    {
        return $this->hasMany(Generate::class);
    }
}
