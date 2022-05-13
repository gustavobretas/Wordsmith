<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class PostsEditor extends Component
{
    public $post;

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => ''
    ];

    public function mount(){
        $this->post = new Post;
    }

    public function savePost(){
        $this->validate();

        $this->post->user_id = auth()->user()->id;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->save();
    }

    public function render()
    {
        return view('livewire.dashboard.posts-editor');
    }
}
