<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public function types()
    {
        return $this->belongsToMany(Type::class, 'car_type');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_car');
    }
}
