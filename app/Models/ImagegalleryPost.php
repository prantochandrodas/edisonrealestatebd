<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagegalleryPost extends Model
{
   protected $fillable=['thumbnail_image','title'];

   public function images()
   {
       return $this->hasMany(ImagegalleryPostImages::class, 'post_id');
   }
}
