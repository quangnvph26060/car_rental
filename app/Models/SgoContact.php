<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgoContact extends Model
{
    use HasFactory;
    protected $table = 'sgo_contact';
    protected $fillable = [
        'headquarters', 'advisory', 'phone_number', 'working_hours', 'booking_procedure'
    ];
}
