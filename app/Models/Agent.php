<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

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

    public function realtron()
    {
        return $this->belongsTo(Realtron::class);
    }
}
