<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post
{
    //
    private $post_path;
    function __construct($path, $parse_content) {
        $this->post_path = $path;
        $this->parse_content = $parse_content;
    }
    function parse_post() {
        $post_file = fopen($this->post_path, 'r');
        $content = fread($post_file, filesize($this->post_path));

        $reg = '/---([\w\W]*?)---([\s\S]*)/i';
        preg_match($reg, $content, $matches);
        $head = $matches[1];
        $content = $matches[2];

        preg_match('/title:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->title = trim($matches[1]);

        preg_match('/author:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->author = trim($matches[1]);

        preg_match('/date:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->date = trim($matches[1]);
        $this->year = ((int)substr($this->date, 0, 4));
        $this->month = ((int)substr($this->date, 5, 2));

        $this->url = '/posts/' . basename($this->post_path, '.md');;

        if ($this->parse_content)
        {
            $this->content = Markdown::convertToHtml($content);
        }

        fclose($post_file);
    }
}
