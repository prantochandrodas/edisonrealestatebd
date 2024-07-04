<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProjectPost extends Model
{
    protected $fillable=['image','name','location','description','apartment_tour_status','virtual_experience_status','tour_status_link','virtual_experience_link'];
}
