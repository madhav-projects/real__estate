<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realtron extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'realtroncompany',
        'pincode',
        'phone',
        'email',
        'address',
        'city',
        'area',
        'password',
        'role',
        'status',
        'upload_file',
        'profile',
        'age_of_company',
    ];

    /**
     * Relationship with the Agent model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
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
