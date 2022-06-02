<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $numResults = 6;
    public $results = 6;
    public $totalPosts;
    public $finishedLoad = false;

    public function mount(){
        $this->totalPosts = Post::list()->count();
    }

    public function loadMore(){
        $this->results += $this->numResults;
        $this->finishedLoad = ($this->results >= $this->totalPosts);
    }

    public function render(){
        $posts = Post::list()->paginate($this->results);
        return view('livewire.blog.post-list', compact('posts'));
    }
}
