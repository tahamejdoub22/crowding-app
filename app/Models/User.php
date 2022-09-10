<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\comment;
use App\Models\update;
use App\Models\team;
use App\Models\testimonials;
use App\Models\project;

class User extends Authenticatable
{
    use LaratrustUserTrait;
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
    public function team() {
        return $this->hasMany(team::class,'user_id', 'id');
    }
    public function testimonials() {
        return $this->hasMany(testimonials::class, 'user_id', 'id');
    }
    public function project() {
        return $this->hasMany(project::class,'user_id', 'id');
    }
    public function comment() {
        return $this->hasMany(comment::class, 'user_id', 'id');
    }
    public function updates() {
        return $this->hasMany(update::class, 'user_id', 'id');
    }
   
 
}
