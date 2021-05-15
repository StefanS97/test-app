<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    public $post;
    public $type;

    public function __construct($post, $type)
    {
        $this->post = $post;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.post');
    }
}
