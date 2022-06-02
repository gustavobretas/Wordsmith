@extends('layouts.app')

@section('content')
    @if(($post->image) && ($post->type == App\Models\Post::TYPE_POST))
    <div class="absolute top-0 left-0 w-full h-auto hidden lg:block lg:h-96 mt-32 bg-cover bg-center" style="background-image:url('{{ Storage::url($post->image) }}')">
        <div class="w-full h-full absolute bg-gradient-to-b from-transparent to-white"></div>
        <div class="w-full h-full absolute bg-white opacity-80"></div>
    </div>

    <div class="max-w-6xl lg:pt-12 lg:px-10 lg:rounded-md overflow-hidden h-96 box-content mx-auto relative">
        <img src="{{ Storage::url($post->image) }}" class="object-cover w-full h-96 lg:rounded-md" />
    </div>
    @endif

    <article class="prose xl:prose-xl 2xl:prose-2xl mx-auto py-20 lg:px-0 px-6">
        <h1 id="{{ $post->slug }}">{{ $post->title }}</h1>
        @if($post->type == App\Models\Post::TYPE_POST)
            <p class="uppercase font-semibold text-xs mb-2.5 text-gray-600">{{ $post->created_at->format('F jS, Y') }}</p>
        @endif
        {!! Str::markdown($post->body) !!}
    </article>
@endsection
