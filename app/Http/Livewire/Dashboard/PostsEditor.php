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
        'post.body' => 'required|min:6',
        'post.image' => '',
        'post.slug' => '',
        'post.excerpt' => '',
        'post.type' => '',
        'post.featured' => '',
        'post.meta_title' => '',
        'post.meta_description' => '',
        'post.meta_schema' => '',
        'post.meta_data' => ''
    ];

    public function mount(Post $post){
        if(isset($post)){
            $this->post = $post;
        } else {
            $this->post = new Post;
        }
    }

    public function savePost(){
        $this->validate();

        $this->post->user_id = auth()->user()->id;
        if(!isset($this->post->id)) {
            $this->post->slug = Str::slug($this->post->title);
        }

        foreach ($this->post->toArray() as $column => $value) {
            if(is_null($value)) {
                unset($this->post->{$column});
            }
        }

        $this->post->save();

        $this->dispatchBrowserEvent('set-url', [
            'url' => '/dashboard/posts/edit/' . $this->post->id
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.posts-editor')
            ->extends('dashboard.layout');
    }
}
