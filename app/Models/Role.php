<?php

namespace App\Models;
use App\Models\User;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    protected $fillable = ['id','name', 'display_name', 'description'];
 
}
