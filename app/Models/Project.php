<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    protected $fillable = [
        'title',
        'contents',
        'image',
        'user_id',
        'genre',
        'start_time',
        'end_time',
        'location',
    ];




    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\User");
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

    public function favoritedBy($user)
    {
        return Favorite::where("user_id", $user->id)->where("project_id", $this->id);
    }
  
    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            $search_split = mb_convert_kana($search, 's');
            $search_split2 = preg_split('/[\s]+/', $search_split);
            
            $query->where(function ($query) use ($search_split2) {
                foreach ($search_split2 as $value) {
                    $query->orWhere('title', 'like', '%'. $value.'%')
                        ->orWhere('contents', 'like', '%'.$value.'%')
                        ->orWhere('genre', 'like', '%'.$value.'%')
                        ->orWhere('start_time', 'like', '%'.$value.'%')
                        ->orWhere('end_time', 'like', '%'.$value.'%')
                        ->orWhere('location', 'like', '%'.$value.'%')
                        ->orWhereHas('user', function ($query) use ($value) {
                            $query->where('name', 'like', '%'.$value.'%');
                        });
                }
            });
            // $query->where(function ($query) use ($search_split2) {
            //     foreach ($search_split2 as $value) {
            //         $query->where(function ($query) use ($value) {
            //             $query->where('title', 'like', '%' . $value . '%')
            //                 ->orWhere('contents', 'like', '%' . $value . '%')
            //                 ->orWhere('genre', 'like', '%' . $value . '%')
            //                 ->orWhere('start_time', 'like', '%' . $value . '%')
            //                 ->orWhere('end_time', 'like', '%' . $value . '%')
            //                 ->orWhere('location', 'like', '%' . $value . '%');
            //         });
            //     }
            // });
            
        }
        
        return $query;
    }
}
