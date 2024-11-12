<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'sgo_types';
    protected $fillable = ['name', 'slug', 'title', 'short_description', 'described_above', 'described_below', 'images'];
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'sgo_car_type');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    protected $casts = ['images' => 'array'];
}
