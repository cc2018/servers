<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;

class Posts
{
    //
    private $posts_path;
    function __construct($path) {
        $this->posts_path = $path;
    }
    function parse_posts() {
        $data = array();
        $mds = $this->scan_mds($this->posts_path);
        foreach($mds as $md)
        {
            $post = new Post($md, false);
            $post->parse_post($md);
            $data[] = $post;
        }
        rsort($data);
        return $data;
    }

    private function scan_mds($dir)
    {
        $files = array();
        $dir_list = scandir($dir);
        foreach($dir_list as $file)
        {
            if ( $file != '..' && $file != '.' )
            {
                if ( is_dir($dir . '/' . $file) )
                {
                    $files[$file] = scan_mds($dir . '/' . $file);
                }
                else
                {
                    $file_path = $dir . '/' . $file;
                    if ( preg_match('/\.md$/i' , $file ) ) {
                        $files[] = $file_path;
                    }
                }
            }
        }

        return $files;
    }
}
