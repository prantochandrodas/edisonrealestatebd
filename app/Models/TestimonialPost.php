<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialPost extends Model
{
    protected $fillable=['video','title','description','owner_name','owner_title','thumbnail_image'];
}
