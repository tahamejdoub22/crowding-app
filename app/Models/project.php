<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\comment;
use App\Models\update;
use App\Models\reward;
use projects\projects;


class project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['project_name', 'user_id', 'project_location', 'project_description','start_date','end_date','goal','pledged','investors','image'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reward() {
        return $this->hasMany(reward::class,'project_id', 'id');
    }
    public function updates() {
        return $this->hasMany(update::class,'project_id', 'id');
    }
    public function comment() {
        return $this->hasMany(comment::class,'project_id', 'id');
    }

}


