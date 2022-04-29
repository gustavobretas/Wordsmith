<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Livewire\Component;

class PostsEditror extends Component
{
    public $post;

    public function mount(){
        $this->post = new Post;
    }

    public function render()
    {
        return view('livewire.dashboard.posts-editror');
    }
}
