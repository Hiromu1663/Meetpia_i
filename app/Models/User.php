<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'gender',
        'birth_year',
        'birth_month',
        'birth_day',
        'address',
        'avatar',
        'status',
        'scores',
        'scored_count',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];






    use HasFactory;

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function joins()
    {
        return $this->hasMany('App\Models\Join');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
}

