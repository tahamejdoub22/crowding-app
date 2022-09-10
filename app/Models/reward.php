<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;

class reward extends Model
{
    protected $fillable = ['name',  'description', 'discount','project_id'];

    use HasFactory;
    public function project() {
        return $this->belongsTo(project::class);
    }
}
