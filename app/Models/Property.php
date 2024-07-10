<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=['name','short_title','address','overview','specification','amount','type','apartment_tour','virtual_experience'];

    public function images()
    {
        return $this->hasMany(PropertyPivot::class, 'property_id');
    }
}
