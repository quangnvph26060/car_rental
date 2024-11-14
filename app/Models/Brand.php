<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'sgo_brands';
    protected $fillable = ['id', 'name', 'title', 'slug', 'long_description', 'short_description', 'type_id', 'images'];
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'sgo_brand_car');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    protected $casts = ['images' => 'array'];
}
