<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'album'
    ];

    public $casts = [
        'album' => 'array'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // if ($model->isDirty('title')) {
            $model->slug = Str::slug($model->title);
            // }
        });
    }
}
