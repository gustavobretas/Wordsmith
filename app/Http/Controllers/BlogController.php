<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home() {
        $featured = Post::where('featured', 1)->where('type', 'post')->first();
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('id', '!=', ($featured->id) ?? 0)
                        ->where('type', 'post')
                        ->where('status', Post::STATUS_PUBLISHED)
                        ->take(6)->get();
        return view('home', compact('featured', 'posts'));
    }
}
