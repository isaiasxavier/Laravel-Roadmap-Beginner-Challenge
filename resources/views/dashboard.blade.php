<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('category.create') }}" class="btn mr-4 bg-green-500 text-white px-4 py-2
                    rounded">Register Category</a>
                    <a href="{{ route('category.index') }}" class="btn mr-4 bg-blue-600 text-white px-4 py-2
                    rounded">List Category</a>
                    <a href="{{ route('tag.create') }}" class="btn mr-4 bg-green-500 text-white px-4 py-2
                    rounded">Register Tag</a>
                    <a href="{{ route('tag.index') }}" class="btn mr-4 bg-blue-600 text-white px-4 py-2 rounded">
                        List Tag</a>
                    <a href="{{ route('article.create') }}" class="btn mr-4 bg-green-500 text-white px-4 py-2
                    rounded">Register Article</a>
                    <a href="{{ route('article.index') }}" class="btn mr-4 bg-blue-600 text-white px-4 py-2
                    rounded">List Article</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
