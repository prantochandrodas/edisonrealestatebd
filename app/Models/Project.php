<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['project_category_id','type_id','location_id','name','slug','short_title','overview','specification','amount','type','apartment_tour','virtual_experience','beds','baths','verandas','area','status','google_map','plot','road_no','block','area_no','city'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class,'project_category_id');
    }
    public function type()
    {
        return $this->belongsTo(Projectype::class,'type_id');
    }
    public function location()
    {
        return $this->belongsTo(ProjectLocation::class,'location_id');
    }
    public function images()
    {
        return $this->hasMany(ProjectPivot::class, 'project_id');
    }
}
