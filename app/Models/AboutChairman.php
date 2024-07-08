<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutChairman extends Model
{
    protected $fillable=['title','name','company_information','chairmen_information','chairmen_image','chairmen_istitute_image'];
}
