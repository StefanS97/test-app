<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatePost extends Component
{
    public $tags;

    public function __construct($tags)
    {
        $this->tags = $tags;
    }

    public function render()
    {
        return view('components.create-post');
    }
}
