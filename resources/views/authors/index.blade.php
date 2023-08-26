@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Authors</h1>
        <ul class="space-y-4">
            @foreach ($authors as $author)
                <li class="p-4 border rounded">
                    <a href="{{ route('authors.show', $author->id) }}" class="text-lg font-medium">
                        {{ $author->firstname }} {{ $author->lastname }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
