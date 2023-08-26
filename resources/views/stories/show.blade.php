@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $story->title }}</h1>
        <p><span class="font-medium"><span class="weight-bold">{{ $story->author->name }}</span> - {{ $story->date }}</span></p>
        <p>Source: <a href="{{ $story->source_url }}"><span class="font-medium">{{ $story->source_url }}</span></a></p>

        <p class="text-sm mb-2">{{ $story->subtitle }}</p>
        <div class="mb-4">@markdown($story->content)</div>
    </div>
@endsection
