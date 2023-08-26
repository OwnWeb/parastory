@extends('layouts.app')

@section('content')
        @if (!empty($story->images))
        <div class="grid grid-cols-5">
            <img src="{{ $story->images[0] }}" class="col-span-5">
            @foreach (array_slice($story->images, 1, 5) as $image)
                <img src="{{ $image }}" class="w-full">
            @endforeach
        </div>
        @endif
        <h1 class="text-2xl font-bold mb-4">{{ $story->title }}</h1>
        <p><span class="font-medium"><span class="weight-bold">{{ $story->author->name }}</span> - {{ $story->date }}</span></p>
        <p>Source: <a href="{{ $story->source_url }}"><span class="font-medium">{{ $story->source_url }}</span></a></p>

        <p class="text-sm mb-2">{{ $story->subtitle }}</p>
        <div class="mb-4">@markdown($story->content)</div>


            <div class="mt-6 flex flex-wrap">
        @if ($prevStory)
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 mr-2"
               href="{{ route('stories.show', [$prevStory->id]) }}">&lt; Précédente : {{ Str::limit($prevStory->title, 50, '...') }}</a>
        @endif
        @if ($nextStory)
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2"
               href="{{ route('stories.show', [$nextStory->id]) }}">Suivante : {{ Str::limit($nextStory->title, 50, '...') }} &gt;</a>
        @endif
            </div>
@endsection
