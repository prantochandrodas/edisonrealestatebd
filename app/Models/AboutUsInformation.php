<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsInformation extends Model
{
    protected $fillable=['short_description_title','short_description','long_description_title','long_description','video_url'];
}
