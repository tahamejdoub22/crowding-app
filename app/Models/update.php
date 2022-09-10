<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\project;

class update extends Model
{
    use HasFactory;
    protected $fillable = ['name',  'project_id', 'text','image','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function project() {
        return $this->belongsTo(project::class);
    }
}
