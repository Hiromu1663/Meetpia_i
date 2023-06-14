<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'role',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
    public function project()
    {
        return $this->belongsTo("App\Models\Project");
    }
}

