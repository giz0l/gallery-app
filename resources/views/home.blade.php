@extends('layouts.base')

@section('title', 'ArtGallery')

@section('content')
    <div class="mx-auto mt-5 text-center">

        @foreach($images as $image)
            <img class="m-5" src='{{ asset('storage/' . $image ) }}' width="400px" height="auto">
        @endforeach

    </div>
@endsection
