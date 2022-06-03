@extends('dashboard.layout')

@section('content')
        <!-- Main Content -->
        <div class="px-8 py-5 relative">
            <div class="max-w-4xl">
                <div class="flex justify-between items-start">
                    <h1 class="font-bold text-gray-800">Posts</h1>
                    <a href="/dashboard/posts/create"
                        class="px-4 py-2 uppercase text-xs font-bold bg-green-500 text-white rounded shadow">New Post</a>
                </div>

                <div class="flex flex-col min-w-full leading-normal shadow rounded-lg overflow-hidden mt-6">
                    <div class="cursor-pointer bg-white hover:bg-yellow-50 flex">
                        <div
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-3/6">
                            Post Title</div>
                        <div
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6">
                            Created</div>
                        <div
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6">
                            Updated</div>
                        <div
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-1/6">
                            Status</div>
                    </div>

                    @foreach(App\Models\Post::all() as $post)
                    <div class="cursor-pointer bg-white hover:bg-yellow-50 flex justify-between"
                        onclick="window.location = '/dashboard/posts/edit/{{$post->id}}'">
                        <div class="px-5 py-5 text-sm w-3/6">
                            <div class="flex flex-col">
                                <p class="text-gray-900 whitespace-no-wrap">{{$post->title}}</p>
                                <code class="text-gray-600 whitespace-no-wrap block text-xs mt-1">/{{$post->slug}}</code>
                            </div>
                        </div>
                        <div class="px-5 py-5 text-sm w-1/6">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $post->created_at->format('M, d Y') }}
                                <span class="block text-gray-600">{{ $post->created_at->format('g:i A') }}</span>
                            </p>
                        </div>
                        <div class="px-5 py-5 text-sm w-1/6">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $post->updated_at->format('M, d Y') }}
                                <span class="block text-gray-600">{{ $post->updated_at->format('g:i A') }}</span>
                            </p>
                        </div>
                        <div class="px-5 py-5 text-sm w-1/6">
                            @if($post->status == App\Models\Post::STATUS_PUBLISHED)
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden="" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Published</span>
                            </span>
                            @else
                            <span class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                <span aria-hidden="" class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                <span class="relative">Draft</span>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End Main Content -->
@endsection
