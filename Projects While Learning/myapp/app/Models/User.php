<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * x     *
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

    public function post1()
    {
        return $this->hasOne('App\Models\Post', 'User_ID', 'id');
    }

    public function allposts()
    {
        return $this->hasMany('App\Models\Post', 'User_ID', 'id');
    }

    // this will return for each role in pivot table record of that role in `role` table
    public function GetUserRoles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function GetUserRoles2()
    {
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at', 'updated_at');
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }


    public function address()
    {
        return $this->hasOne("App\Models\ztmp_address", "user_id");
    }

}
