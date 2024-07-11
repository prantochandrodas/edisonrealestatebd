<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['project_category_id','type_id','location_id','name','short_title','address','overview','specification','amount','type','apartment_tour','virtual_experience','beds','baths','verandas','area','status'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    public function type()
    {
        return $this->belongsTo(Projectype::class);
    }
    public function location()
    {
        return $this->belongsTo(ProjectLocation::class);
    }
    public function images()
    {
        return $this->hasMany(ProjectPivot::class, 'project_id');
    }
}
