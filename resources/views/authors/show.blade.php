@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $author->firstname }} {{ $author->lastname }}</h1>
        <p class="mb-2">Website: <span class="font-medium">{{ $author->website_url }}</span></p>
        <!-- Ajoute les autres champs ici -->
    </div>
@endsection
