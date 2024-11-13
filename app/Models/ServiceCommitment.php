<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCommitment extends Model
{
    use HasFactory;
    protected $table = 'sgo_service_commitments';
    protected $fillable = [
        'title',
        'icon',
        'description'
    ];
}
