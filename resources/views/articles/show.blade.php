@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="max-w-md mx-auto bg-neutral-400 shadow-lg rounded-lg md:max-w-5xl">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="w-64 mx-auto">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-96
                        object-cover rounded">
                    </div>
                     <h1 class="text-xl font-medium">{{ $article->title }}</h1>
                    <p class="mt-2 text-gray-600">{{ $article->full_text }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <span class="text-sm text-gray-600">Created at: {{ $article->created_at->format('d/m/Y')
                            }}</span><br>
                            <span class="text-sm text-gray-600">Updated at: {{ $article->updated_at->format('d/m/Y')
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection