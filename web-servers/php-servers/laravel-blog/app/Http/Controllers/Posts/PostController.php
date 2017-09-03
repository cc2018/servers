<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts\Post;

class PostController extends Controller
{
    //
    public function index($name)
    {
        # $post =
        $path = base_path('posts/' . $name . '.md');
        $post = new Post($path, true);
        $post->parse_post();

        return view('posts/post')->withPost($post);
    }
}
