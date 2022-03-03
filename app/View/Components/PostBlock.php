<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostBlock extends Component
{
    public $id;
    public $title;
    public $body;
    public $createdAt;
    public $updatedAt;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $body, $createdAt, $updatedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-block');
    }
}
