<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Validator;
use Livewire\WithFileUploads;


class PostsEditor extends Component
{

    use WithFileUploads;

    public $post;
    public $image;

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => 'required|min:6',
        'post.image' => '',
        'post.slug' => '',
        'post.excerpt' => '',
        'post.type' => '',
        'post.status' => '',
        'post.featured' => '',
        'post.meta_title' => '',
        'post.meta_description' => '',
        'post.meta_schema' => '',
        'post.meta_data' => '',
        'image' => 'nullable|image|max:5120'
    ];

    public function mount(Post $post){
        if(isset($post)){
            $this->post = $post;
        } else {
            $this->post = new Post;
        }
    }

    public function savePost(){
        $validator = validator::make($this->getDataForValidation($this->rules), $this->rules);

        if($validator->fails()) {
            $this->dispatchBrowserEvent('notification-show', [
                'type' => 'error',
                'message' => str_replace('post.', '', $validator->errors()->first())
            ]);
            return;
        }

        $this->post->user_id = auth()->user()->id;
        if(!isset($this->post->id)) {
            $this->post->slug = Str::slug($this->post->title);
        }

        if($this->image){
            $this->post->image = $this->image->store('images');
            $this->image = null;
        }

        foreach ($this->post->toArray() as $column => $value) {
            if(is_null($value) && $column != 'image') {
                unset($this->post->{$column});
            }
        }

        $this->post->save();

        $this->dispatchBrowserEvent('set-url', [
            'url' => '/dashboard/posts/edit/' . $this->post->id
        ]);

        $this->dispatchBrowserEvent('notification-show', [
            'type' => 'success',
            'message' => 'Successfully saved post.'
        ]);
    }

    public function removeTemporaryImage(){
        $this->image = null;
    }

    public function removeImage(){
        $this->post->image = null;
    }

    public function render()
    {
        return view('livewire.dashboard.posts-editor')
            ->extends('dashboard.layout');
    }
}
