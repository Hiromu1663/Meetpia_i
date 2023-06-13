<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_id',
        'project_id',
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

