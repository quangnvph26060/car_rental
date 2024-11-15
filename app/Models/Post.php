<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'sgo_posts';
    protected $fillable = ['category_post_id', 'title', 'image', 'description', 'status', 'slug'];
    public function categoryPost()
    {
        return $this->belongsTo(CategoryPost::class);
    }
}
