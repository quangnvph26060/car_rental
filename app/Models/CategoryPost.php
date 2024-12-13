<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'sgo_category_posts';
    protected $fillable = ['name', 'slug'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
