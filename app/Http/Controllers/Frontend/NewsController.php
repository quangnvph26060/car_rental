<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function blog($slug = null)
    {
        if ($slug) {
            $post = Post::where('slug', $slug)->first();
            // dd($post);
            return view('frontend.pages.blog.detail', compact('slug', 'post'));
        }

        $categoriesPost = CategoryPost::select('id', 'name','slug')->get();
        $posts = Post::where('status', 1)->get();
        return view('frontend.pages.blog.list', compact('slug', 'categoriesPost', 'posts'));
    }
    public function postInCategoryBlog($slug)
    {
        $category = CategoryPost::where('slug', $slug)->first();
        $categoriesPost = CategoryPost::select('id', 'name', 'slug')->get();
        return view('frontend.pages.blog.category', compact('category' , 'categoriesPost'));
    }
}
