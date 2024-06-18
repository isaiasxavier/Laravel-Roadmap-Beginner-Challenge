@extends('layouts.app')


@section('content')

    <table class="m-3 divide-y divide-gray-200 w-1/2 mx-auto">
        @if (session('success'))
            <br><br>
            <div id="success-message" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50
             dark:bg-gray-800
            dark:text-green-400 w-1/5 mx-auto"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('success')['message'] }}
                    <br>
                    <span>Old: {{ session('success')['oldName'] }}</span>
                    <br>
                    <span>New: {{ session('success')['newName'] }}</span>
                </div>
                @endif
                <caption class="px-6 py-3 text-left text-lg font-medium text-gray-500 uppercase tracking-wider">
                    Categories
                    List
                </caption>
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Created
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Updated
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Edit
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Delete
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-gray-200' }}">
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->updated_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-white bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto
                    px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </div>
    </table>
    <div class="mt-6 flex justify-center w-full">
        <br><br>
        {{ $categories->links() }}
    </div>

    <script>
        window.onload = function () {
            setTimeout(function () {
                var element = document.getElementById('success-message');
                if (element) {
                    element.style.display = 'none';
                }
            }, 5000); // 5000 milissegundos = 5 segundos
        };
    </script>

@endsection