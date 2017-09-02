<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post
{
    //
    private $post_path;
    public $title;
    public $body;
    function __construct($path) {
        $this->post_path = $path;
    }
    function parse_post() {
        $post_file = fopen($this->post_path, 'r');
        $content = fread($post_file, filesize($this->post_path));

        $reg = '/---([\w\W]*?)---([\s\S]*)/i';
        preg_match($reg, $content, $matches);
        $head = $matches[1];
        $content = $matches[2];

        preg_match('/title:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->title = $matches[1].trim(' ');

        preg_match('/author:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->author = $matches[1].trim(' ');

        preg_match('/date:(.*?)[\r\n|\n]/i', $head, $matches);
        $this->date = $matches[1].trim(' ');

        $this->content = Markdown::convertToHtml($content);

        fclose($post_file);
    }
}
