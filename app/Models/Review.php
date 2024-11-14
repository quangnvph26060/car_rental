<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'sgo_reviews';
    protected $fillable = ['customer_name', 'customer_role', 'avatar', 'comment', 'rate'];
}
