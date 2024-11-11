<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'introductory_title',
        'slug',
        'price',
        'promotion_details',
        'number_of_seats',
        'color_id',
        'description',
        'status',
        'image'
    ];
    public function types()
    {
        return $this->belongsToMany(Type::class, 'car_type');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_car');
    }
    public function carImages()
    {
        return $this->hasMany(CarImage::class);
    }
    public function colors(){
        return $this->hasMany(Color::class);
    }
}
