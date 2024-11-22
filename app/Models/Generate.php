<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 
        'agent_name', 
        'price', 
        'admin_share', 
        'company_share', 
        'agent_share', 
        'user_share'
    ];
}
