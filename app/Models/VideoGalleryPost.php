<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGalleryPost extends Model
{
   protected $fillable=['title','image','video_url'];
}
