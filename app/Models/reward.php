<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['name',  'description', 'discount', 'project_id'];

    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
