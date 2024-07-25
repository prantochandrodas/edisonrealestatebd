<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerJobPost extends Model
{
    protected $fillable=['title','vacancy','employment_status','experience','description'];
}
