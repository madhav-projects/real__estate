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
        'user_share',
        'user_id',
        'agent_id',
        'company_id',
        'admin_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
