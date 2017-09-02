<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    //
    public function index($name)
    {
        # $post =
        $path = base_path('posts/' . $name . '.md');
        $post = new Post($path);
        $post->parse_post();

        return view('posts/post')->withPost($post);
    }
}
