<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realtron extends Model
{
    use HasFactory;
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

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

}
