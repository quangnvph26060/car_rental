<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'sgo_colors';
    protected $fillable = ['name', 'code_color'];
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
