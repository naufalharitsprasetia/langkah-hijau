<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Articlecard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $active = null,
        public object $post,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.articlecard');
    }
}