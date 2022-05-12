<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Livewire\Component;

class PostsEditor extends Component
{
    public $post;

    protected $rules = [
        'post.title' => 'required|min:6'
    ];

    public function mount(){
        $this->post = new Post;
    }

    public function savePost(){
        dd('it works');
    }

    public function render()
    {
        return view('livewire.dashboard.posts-editor');
    }
}
