<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'type_id',
        'start_date',
        'rental_days',
        'name',
        'phone',
        'note'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
