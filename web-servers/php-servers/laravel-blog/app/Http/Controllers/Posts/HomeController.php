<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts\Posts;

class HomeController extends Controller
{
    //
    public function index()
    {
        # $post =
        $path = base_path('posts');
        $posts = new Posts($path);
        $data = $posts->parse_posts();

        return view('posts/home')->withPosts($data);
    }
}
