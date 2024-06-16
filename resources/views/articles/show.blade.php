@extends('layouts.guest')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->full_text }}</p>
@endsection