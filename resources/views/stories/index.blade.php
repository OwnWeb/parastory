@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Stories</h1>
        <ul class="space-y-4">
            @foreach ($stories as $story)
                <li class="p-4 border rounded">
                    <a href="{{ route('stories.show', $story->id) }}" class="text-lg font-medium">
                        {{ $story->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
