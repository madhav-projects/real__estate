<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'user_phone',
        'user_address',
        'agent_name',
        'agent_phone',
        'message'
    ];

}
