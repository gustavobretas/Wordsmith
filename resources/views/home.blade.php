@extends('layouts.app')

@section('content')
    @if($featured ?? false)
    <!-- Top Hero Post -->
    <section class="bg-gradient-to-b from-white to-gray-50">

        <div class="mx-auto lg:max-w-7xl sm:max-w-xl md:max-w-full pt-10 sm:pt-16 px-10">
            <div class="bg-white shadow-sm border border-gray-100 rounded-lg cursor-pointer overflow-hidden w-full">
                <div class="flex flex-col-reverse items-center md:flex-row">
                    <div class="flex flex-col items-start justify-center w-full h-full py-6 md:w-7/12">
                        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:py-0 py-5 px-8 md:px-10 lg:px-12 md:space-y-5">
                            <div class="bg-gray-900 flex items-center pl-2 pr-3 py-1.5 mb-3 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <span>Featured</span>
                            </div>
                            <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">
                                <a href="{{ $featured->slug }}">{{ $featured->title }}</a>
                            </h1>
                            <p class="pt-5 text-sm font-medium">Featured Post ·
                                <span class="mx-1">{{ $featured->created_at->format('F jS, Y') }}</span> ·
                                <a href="{{ $featured->slug }}" class="mr-1 underline">Read More</a>
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-5/12">
                        <a href="{{ $featured->slug }}" class="block">
                            <img class="object-cover w-full h-full max-h-64 sm:max-h-96" src="{{ Storage::url($featured->image) }}" alt="{{ $featured->title }}">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Grid Posts -->
    <section class="bg-gray-50 sm:pt-16 pt-10">
        <livewire:blog.post-list></livewire:blog.post-list>
    </section>
@endsection
