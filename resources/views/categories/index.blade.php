@extends('layouts.app')

@section('content')
    <table class="m-3 divide-y divide-gray-200 w-1/2 mx-auto">
        <caption class="px-6 py-3 text-left text-lg font-medium text-gray-500 uppercase tracking-wider">Categories List</caption>
        <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">Created</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">Updated</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($categories as $category)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-gray-200' }}">
                <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->created_at }}</td>
                <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-6 flex justify-center w-full">
        <br><br>
        {{ $categories->links() }}
    </div>
@endsection