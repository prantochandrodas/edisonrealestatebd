<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPivot extends Model
{
    
    protected $fillable = [
        'project_id',
        'image',
    ];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }
}
