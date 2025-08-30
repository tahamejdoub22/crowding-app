<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'location',
        'website',
        'phone',
        'avatar',
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

    public function team()
    {
        return $this->hasMany(Team::class, 'user_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonials::class, 'user_id', 'id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function updates()
    {
        return $this->hasMany(Update::class, 'user_id', 'id');
    }

    /**
     * Get the user's investments
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    /**
     * Get the user's payment methods
     */
    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    /**
     * Get the user's default payment method
     */
    public function defaultPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::class)->where('is_default', true);
    }

    /**
     * Get projects backed by this user
     */
    public function backedProjects()
    {
        return $this->belongsToMany(Project::class, 'investments')
            ->withPivot(['amount', 'reward_id', 'message', 'status', 'backed_at'])
            ->withTimestamps();
    }
}
