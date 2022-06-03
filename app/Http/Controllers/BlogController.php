<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home() {
        $featured = Post::firstFeatured()->first();
        return view('home', compact('featured'));
    }

    public function post(Post $post) {
        return view('post', compact('post'));
    }
}
