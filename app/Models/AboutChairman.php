<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AboutChairman extends Model
{
    protected $fillable=['title','name','company_information','chairman_information','chairman_image','institute_logo','reference'];
}
