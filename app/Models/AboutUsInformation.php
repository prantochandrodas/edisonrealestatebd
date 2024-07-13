<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsInformation extends Model
{
    protected $fillable=['title','short_description','long_description','thumbnail_image','video_url'];
}
